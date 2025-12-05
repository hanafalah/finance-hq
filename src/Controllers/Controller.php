<?php

namespace Projects\FinanceHq\Controllers;

use App\Http\Controllers\Controller as MainController;
use Projects\FinanceHq\Concerns\HasUser;

abstract class Controller extends MainController
{
    use HasUser;
}
