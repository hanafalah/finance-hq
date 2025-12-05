<?php

namespace Projects\FinanceHq\Controllers\API\Submission;

use Projects\FinanceHq\Contracts\Schemas\PosTransaction;
use Projects\FinanceHq\Controllers\API\ApiController;
use Xendit\Configuration;

class Environment extends ApiController{
    public function __construct(
        public PosTransaction $__pos_schema
    ){
        parent::__construct();
    }

    protected function commonConditional($query){

    }

    
    protected function commonRequest(){
        $this->userAttempt();
    }
}