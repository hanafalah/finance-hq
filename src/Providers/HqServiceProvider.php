<?php

namespace Projects\FinanceHq\Providers;

use Illuminate\Foundation\Http\Kernel;
use Hanafalah\LaravelSupport\{
    Concerns\NowYouSeeMe,
    Supports\PathRegistry
};
use Projects\FinanceHq\{
    FinanceHq,
    Contracts,
};
use Hanafalah\MicroTenant\Facades\MicroTenant;
use Projects\FinanceHq\Contracts\Schemas\ModuleWorkspace\Workspace;
use Projects\FinanceHq\Contracts\Schemas\Product;
use Projects\FinanceHq\Contracts\Supports\ConnectionManager as ConnectionManager;
use Projects\FinanceHq\Schemas\Product as SchemasProduct;
use Projects\FinanceHq\Schemas\ModuleWorkspace\Workspace as SchemasWorkspace;
use Projects\FinanceHq\Supports\ConnectionManager as SupportsConnectionManager;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class FinanceHqServiceProvider extends FinanceHqEnvironment
{
    use NowYouSeeMe;

    public function register()
    {
        $this->registerMainClass(FinanceHq::class)
             ->registerCommandService(CommandServiceProvider::class)
            ->registers([
                '*',
                'Services' => function(){
                    $this->binds([
                        Contracts\FinanceHq::class => function(){
                            return new FinanceHq;
                        },
                        ConnectionManager::class => SupportsConnectionManager::class,
                        Workspace::class => SchemasWorkspace::class,
                        Product::class => SchemasProduct::class
                    ]);   
                },
                'Config' => function() {
                    $this->__config_finance_hq = config('finance-hq');
                },
                'Provider' => function(){
                    $this->bootedRegisters($this->__config_finance_hq['packages'], 'finance-hq');
                    $this->registerOverideConfig('finance-hq',__DIR__.'/../'.$this->__config_finance_hq['libs']['config']);
                }
            ]);    
    }

    public function boot(Kernel $kernel){    
        $this->registerModel();
        $this->app->booted(function(){
            try {
                $tenant = $this->TenantModel()->where('flag','APP')->where('props->product_type','FinanceHq')->first();  
                if (isset($tenant)) {
                    $cache = app(config('laravel-support.service_cache'))->getConfigCache();

                    $this->registers([
                        'Provider' => function(){
                            $this->bootedRegisters($this->__config_finance_hq['packages'], 'finance-hq', __DIR__.'/../'.$this->__config_finance_hq['libs']['migration'] ?? 'Migrations');
                            $this->registerOverideConfig('finance-hq',__DIR__.'/../'.$this->__config_finance_hq['libs']['config']);
                        }
                    ]);

                    MicroTenant::impersonate($tenant,false);    
                    ($this->checkCacheConfig('config-cache')) ? $this->multipleBinds(config('app.contracts')) : $this->autoBinds();
                    $this->registerRouteService(RouteServiceProvider::class);
                    
                }

                if (isset(request()->product_service_id)){
                    $workspace = $this->WorkspaceModel()->findOrFail(request()->product_service_id);
                    config([
                        'database.connections.clinic.database' => $workspace->tenant->tenancy_db_name
                    ]);
                }

                $connection = new AMQPStreamConnection(
                    env('RABBITMQ_HOST'),
                    env('RABBITMQ_PORT'),
                    env('RABBITMQ_USER'),
                    env('RABBITMQ_PASSWORD'),
                    '/'
                );

                $channel = $connection->channel();

                foreach (['default', 'billing'] as $queue) {
                    $channel->queue_declare($queue, false, true, false, false);
                }

                $channel->close();
                $connection->close();

                $this->app->singleton(PathRegistry::class, function () {
                    $registry = new PathRegistry();
        
                    $config = config("finance-hq");
                    foreach ($config['libs'] as $key => $lib) $registry->set($key, 'projects'.$lib);
                    return $registry;
                });
            } catch (\Throwable $th) {
            }
        });
    }    
}
