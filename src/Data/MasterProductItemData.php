<?php

namespace Projects\FinanceHq\Data;

use Hanafalah\LaravelSupport\Data\UnicodeData;
use Projects\FinanceHq\Contracts\Data\MasterProductItemData as DataMasterProductItemData;

class MasterProductItemData extends UnicodeData implements DataMasterProductItemData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'MasterProductItem';
        parent::before($attributes);
    }
}