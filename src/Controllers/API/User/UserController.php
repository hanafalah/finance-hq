<?php

namespace Projects\FinanceHq\Controllers\API\User;

use Projects\FinanceHq\Requests\API\User\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class UserController extends EnvironmentController{
    public function index(ViewRequest $request){
        return $this->getUserPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showUser();
    }
}