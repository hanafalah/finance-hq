<?php

namespace Projects\FinanceHq\Models\ModulePayment;

use Hanafalah\ModulePayment\Models\Payment\PaymentSummary as PaymentPaymentSummary;
use Projects\FinanceHq\Resources\ModulePaymentSummary\{
    ViewPaymentSummary,ShowPaymentSummary
};

class PaymentSummary extends PaymentPaymentSummary
{
    public function getShowResource(){
        return ShowPaymentSummary::class;
    }

    public function getViewResource(){
        return ViewPaymentSummary::class;
    }
}
