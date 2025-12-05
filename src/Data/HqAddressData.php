<?php

namespace Projects\FinanceHq\Data;

use Projects\FinanceHq\Contracts\Data\FinanceHqAddressData as DataFinanceHqAddressData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Hanafalah\ModuleRegional\Data\AddressData;

class FinanceHqAddressData extends AddressData implements DataFinanceHqAddressData{}