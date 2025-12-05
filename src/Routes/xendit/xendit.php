<?php

use Illuminate\Support\Facades\Route;
use Projects\FinanceHq\Controllers\API\Xendit\{
    PaymentMethod\PaymentMethodController,
    Transaction\TransactionController
};

Route::apiResource('/payment-method',PaymentMethodController::class)->only('index');
Route::apiResource('/transaction',TransactionController::class)->only('store');