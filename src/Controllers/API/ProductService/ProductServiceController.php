<?php

namespace Projects\FinanceHq\Controllers\API\ProductService;

use Projects\FinanceHq\Requests\API\ProductService\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ProductServiceController extends EnvironmentController{
    public function index(ViewRequest $request){
        return $this->getWorkspacePaginate();
    }

    public function show(ShowRequest $request){
        return $this->showWorkspace();
    }

    public function store(StoreRequest $request){
        return $this->storeWorkspace();
    }

    public function delete(DeleteRequest $request){
        return $this->deleteWorkspace();
    }
}