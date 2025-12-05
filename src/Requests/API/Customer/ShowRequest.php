<?php

namespace Projects\FinanceHq\Requests\API\Customer;

class ShowRequest extends Environment
{

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [];
  }
}
