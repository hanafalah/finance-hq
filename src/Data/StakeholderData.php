<?php

namespace Projects\FinanceHq\Data;

use Hanafalah\ModulePeople\Data\PeopleData;
use Projects\FinanceHq\Contracts\Data\StakeholderData as DataStakeholderData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class StakeholderData extends PeopleData implements DataStakeholderData
{
    #[MapInputName('company_id')]
    #[MapName('company_id')]
    public mixed $company_id = null;
}