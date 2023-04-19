<?php

namespace App\Helpers\Shipping\Strategies;

use App\Models\Order;

class NovaPostaStrategy implements \App\Helpers\Shipping\Interfaces\ShippingStrategy
{

    public function calculateShippingCost(string $addressA, string $addressB, Order $order): float
    {
        // TODO: Implement calculateShippingCost() method.
    }

    public function shipping(Order $order): bool
    {
        // TODO: Implement shipping() method.
    }
}
