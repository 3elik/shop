<?php

namespace App\Helpers\Payment\Abstracts;

use App\Helpers\Payment\Interfaces\PaymentMethod;

abstract class AbstractPaymentMethodFactory
{
    abstract public function createPaymentMethod(): PaymentMethod;
}
