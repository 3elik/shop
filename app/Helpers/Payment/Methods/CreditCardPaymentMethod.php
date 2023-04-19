<?php

namespace App\Helpers\Payment\Methods;

use App\Helpers\Payment\Interfaces\PaymentMethod;

class CreditCardPaymentMethod implements PaymentMethod
{
    public function pay(): bool
    {
        // TODO: Implement pay() method.
        return true;
    }
}
