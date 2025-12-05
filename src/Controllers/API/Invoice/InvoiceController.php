<?php

namespace Projects\FinanceHq\Controllers\API\Invoice;

use Projects\FinanceHq\Requests\API\Invoice\{
    ViewRequest, ShowRequest
};

class InvoiceController extends EnvironmentController{
    protected function commonConditional($query){
        $query->whereNotNull('reported_at')->whereHas('paymentHistory',function($q){
            $q->where('props->is_deferred',false);
        });
    }

    public function index(ViewRequest $request){
        return $this->getInvoicePaginate();
    }

    public function show(ShowRequest $request){
        return $this->showInvoice();
    }
}