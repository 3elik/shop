<?php

namespace App\Helpers\Payment\Factories;

use App\Helpers\Payment\Interfaces\PaymentMethod;
use App\Helpers\Payment\Methods\BankTransferPaymentMethod;

class BankTransferPaymentMethodFactory extends AbstractPaymentMethodFactory
{
    public function createPaymentMethod(): PaymentMethod
    {
        return new BankTransferPaymentMethod();
    }
}
