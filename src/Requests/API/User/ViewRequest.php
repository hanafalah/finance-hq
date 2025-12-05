<?php

namespace Projects\FinanceHq\Requests\API\User;

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