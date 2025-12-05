<?php

namespace Projects\FinanceHq\Supports;

use Hanafalah\LaravelSupport\Concerns\Support\HasCache;
use Projects\FinanceHq\Contracts\Supports\ServiceCache as SupportsServiceCache;
use Illuminate\Support\Str;

class ServiceCache implements SupportsServiceCache{
    use HasCache;

    protected $__cache_data = [
        'finance-hq' => [
            'name'    => 'app-finance-hq',
            'tags'    => ['finance-hq','app-finance-hq'],
            'forever' => true
        ]
    ];

    public function handle(?array $cache_data = null): void{
        $cache_data ??= $this->__cache_data['finance-hq'];
        $this->setCache($cache_data, function(){
            $cache = [
                'app.cached_lists' => [
                    'app.contracts',
                    'database.models',
                    'finance-hq.packages',
                    'config-cache'
                ],
                'app.contracts'         => config('app.contracts'),
                'database.models'       => config('database.models'),
                'finance-hq.packages'           => config('finance-hq.packages'),
                'configs' => []
            ];            

            foreach (config('finance-hq.packages') as $key => $value){
                $key = Str::kebab(Str::after($key, '/'));
                $cache['configs'][$key] = config($key);
            }

            config([
                'app.cached_lists' => $cache['app.cached_lists'] ?? [],
                'app.contracts'    => $cache['app.contracts'] ?? [],
                'database.models'  => $cache['database.models'] ?? [],
                'finance-hq.packages'     => $cache['finance-hq.packages'] ?? [],
                'configs' => $cache['configs'] ?? []
            ]);
            return $cache;
        }, false);
    }   

    public function getConfigCache(): ?array{
        $cache_data = $this->__cache_data['finance-hq'];
        $cache = $this->getCache($cache_data['name'],$cache_data['tags']);
        if (isset($cache)){
            config([
                'app.cached_lists' => $cache['app.cached_lists'] ?? [],
                'app.contracts'    => $cache['app.contracts'] ?? [],
                'database.models'  => $cache['database.models'] ?? [],
                'finance-hq.packages'      => $cache['finance-hq.packages'] ?? [],
                'configs'          => $cache['configs'] ?? []
            ]);
            foreach ($cache['configs'] as $key => $config) {
                config([$key => $config]);
            }
        }
        return $cache;
    }
}