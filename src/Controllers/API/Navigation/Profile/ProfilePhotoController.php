<?php

namespace Projects\FinanceHq\Controllers\API\Navigation\Profile;

use Hanafalah\ModuleEmployee\Contracts\Schemas\ProfilePhoto;
use Projects\FinanceHq\Controllers\API\ApiController;
use Projects\FinanceHq\Requests\API\Navigation\Profile\{
    ShowRequest, StoreRequest
};

class ProfilePhotoController extends ApiController{
    public function __construct(
        protected ProfilePhoto $__profile_schema    
    ){}

    public function store(StoreRequest $request){
        return $this->__profile_schema->storeProfilePhoto();
    }

    public function show(ShowRequest $request){
        return $this->__profile_schema->showProfilePhoto();
    }
}