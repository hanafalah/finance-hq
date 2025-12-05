<?php

namespace Projects\FinanceHq\Models\MicroTenant;

use Hanafalah\MicroTenant\Models\Tenant\Tenant as TenantTenant;
use Projects\FinanceHq\Resources\Tenant\ShowTenant;
use Projects\FinanceHq\Resources\Tenant\ViewTenant;

class Tenant extends TenantTenant
{
    public function getShowResource(){
        return ShowTenant::class;
    }

    public function getViewResource(){
        return ViewTenant::class;
    }
}
