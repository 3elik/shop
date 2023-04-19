<?php

namespace App\Helpers\Payment\Factories;

use App\Helpers\Payment\Abstracts\AbstractPaymentMethodFactory;
use App\Helpers\Payment\Interfaces\PaymentMethod;
use App\Helpers\Payment\Methods\StripePaymentMethod;

class StripePaymentMethodFactory extends AbstractPaymentMethodFactory
{
    public function createPaymentMethod(): PaymentMethod
    {
        return new StripePaymentMethod();
    }
}
