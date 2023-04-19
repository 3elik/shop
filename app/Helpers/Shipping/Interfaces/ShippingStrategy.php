<?php

namespace App\Helpers\Shipping\Interfaces;

use App\Models\Order;

interface ShippingStrategy
{
    public function calculateShippingCost(string $addressA, string $addressB, Order $order): float;

    public function shipping(Order $order): bool;
}
