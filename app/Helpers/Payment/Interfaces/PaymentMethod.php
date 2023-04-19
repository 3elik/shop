<?php

namespace App\Helpers\Payment\Interfaces;

interface PaymentMethod
{
    public function pay(): bool;
}
