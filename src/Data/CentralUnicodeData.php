<?php

namespace Projects\FinanceHq\Data;

use Hanafalah\LaravelSupport\Data\UnicodeData;
use Projects\FinanceHq\Contracts\Data\CentralUnicodeData as DataCentralUnicodeData;

class CentralUnicodeData extends UnicodeData implements DataCentralUnicodeData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'CentralUnicode';
        parent::before($attributes);
    }
}