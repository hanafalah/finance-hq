<?php

namespace Projects\FinanceHq\Commands;
use Illuminate\Support\Facades\App;

class InstallMakeCommand extends EnvironmentCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'finance-hq:install';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used for initial installation of this module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $provider = 'Projects\FinanceHq\FinanceHqServiceProvider';

        $this->comment('Installing Module...');
        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'config'
        ]);
        $this->info('✔️  Created config/finance-hq.php');

        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'migrations'
        ]);
        $this->info('✔️  Created migrations');

        $this->call('optimize:clear');
        $direct_access = config('micro-tenant.direct_provider_access');

        config(['micro-tenant.direct_provider_access' => false]);
        $this->call('migrate');
        $this->call('db:seed');
        config(['micro-tenant.direct_provider_access' => $direct_access]);
        $this->callSilent('finance-hq:seed');

        $this->comment('projects/finance-hq installed successfully.');
    }
}
