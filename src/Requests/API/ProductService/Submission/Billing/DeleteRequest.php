<?php

namespace Projects\FinanceHq\Requests\API\ProductService\Submission\Billing;

use Projects\FinanceHq\Requests\API\ProductService\Billing\Environment;

class DeleteRequest extends Environment
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