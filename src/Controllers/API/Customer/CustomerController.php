<?php

namespace Projects\FinanceHq\Controllers\API\Customer;

use Projects\FinanceHq\Requests\API\Customer\{
    ViewRequest, ShowRequest
};

class CustomerController extends EnvironmentController{
    public function index(ViewRequest $request){
        return $this->getConsumentPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showConsument();
    }
}