<?php

namespace App\Helpers\Payment\Methods;

use App\Helpers\Payment\Interfaces\PaymentMethod;

class PayPalPaymentMethod implements PaymentMethod
{

    public function pay(): bool
    {
        // TODO: Implement pay() method.
        return true;
    }
}
