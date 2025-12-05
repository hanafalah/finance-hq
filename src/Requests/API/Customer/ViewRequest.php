<?php

namespace Projects\FinanceHq\Requests\API\Customer;

class ViewRequest extends Environment
{

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
    ];
  }
}