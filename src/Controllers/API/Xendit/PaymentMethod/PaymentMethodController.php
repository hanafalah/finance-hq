<?php

namespace Projects\FinanceHq\Controllers\API\Xendit\PaymentMethod;

use Hanafalah\LaravelXendit\Facades\LaravelXendit;
use Projects\FinanceHq\Controllers\API\Xendit\EnvironmentController;
use Illuminate\Http\Request;

class PaymentMethodController extends EnvironmentController{
    public function index(Request $request){
        return LaravelXendit::schemaContract('XPaymentMethod')->viewXPaymentMethodList($request->all());
    }
}