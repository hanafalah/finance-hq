<?php

namespace Projects\FinanceHq\Schemas;

use Projects\FinanceHq\Contracts\Schemas\FinanceHqAddress as ContractsFinanceHqAddress;
use Hanafalah\ModuleRegional\Schemas\Regional\Address;

class FinanceHqAddress extends Address implements ContractsFinanceHqAddress
{
    protected string $__entity = 'FinanceHqAddress';
    public $hq_address_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'hq_address',
            'tags'     => ['hq_address', 'hq_address-index'],
            'duration' => 24 * 60
        ]
    ];
}