<?php

namespace Projects\FinanceHq\Contracts\Schemas;

use Projects\FinanceHq\Contracts\Data\FinanceHqAddressData;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleRegional\Contracts\Schemas\Regional\Address;

/**
 * @see \Projects\FinanceHq\Schemas\FinanceHqAddress
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateFinanceHqAddress(?FinanceHqAddressData $hq_address_dto = null)
 * @method Model prepareUpdateFinanceHqAddress(FinanceHqAddressData $hq_address_dto)
 * @method bool deleteFinanceHqAddress()
 * @method bool prepareDeleteFinanceHqAddress(? array $attributes = null)
 * @method mixed getFinanceHqAddress()
 * @method ?Model prepareShowFinanceHqAddress(?Model $model = null, ?array $attributes = null)
 * @method array showFinanceHqAddress(?Model $model = null)
 * @method Collection prepareViewFinanceHqAddressList()
 * @method array viewFinanceHqAddressList()
 * @method LengthAwarePaginator prepareViewFinanceHqAddressPaginate(PaginateData $paginate_dto)
 * @method array viewFinanceHqAddressPaginate(?PaginateData $paginate_dto = null)
 * @method array storeFinanceHqAddress(?FinanceHqAddressData $hq_address_dto = null)
 * @method Collection prepareStoreMultipleFinanceHqAddress(array $datas)
 * @method array storeMultipleFinanceHqAddress(array $datas)
 */

interface FinanceHqAddress extends Address{}