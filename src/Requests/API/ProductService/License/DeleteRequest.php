<?php

namespace Projects\FinanceHq\Requests\API\ProductService\License;

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