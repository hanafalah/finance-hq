<?php

namespace Projects\FinanceHq;

use Illuminate\Database\Eloquent\Model;
use Hanafalah\LaravelSupport\{
    Concerns\Support\HasRepository,
    Supports\PackageManagement,
    Events as SupportEvents
};
use Projects\FinanceHq\Contracts\FinanceHq as ContractsFinanceHq;

class FinanceHq extends PackageManagement implements ContractsFinanceHq{
    use Supports\LocalPath,HasRepository;

    const LOWER_CLASS_NAME = "finance-hq";
    const SERVICE_TYPE     = "";
    const ID               = "1";

    public ?Model $model;

    public function events(){
        return [
            SupportEvents\InitializingEvent::class => [
                
            ],
            SupportEvents\EventInitialized::class  => [],
            SupportEvents\EndingEvent::class       => [],
            SupportEvents\EventEnded::class        => [],
            //ADD MORE EVENTS
        ];
    }

    protected function dir(): string{
        return __DIR__;
    }
}
