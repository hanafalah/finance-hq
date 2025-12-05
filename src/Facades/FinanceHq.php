<?php

namespace Projects\FinanceHq\Facades;

class FinanceHq extends \Illuminate\Support\Facades\Facade
{
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor()
  {
    return \Projects\FinanceHq\Contracts\FinanceHq::class;
  }
}
