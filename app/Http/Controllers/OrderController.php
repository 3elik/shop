<?php

namespace App\Http\Controllers;

use App\Helpers\Payment\Factories\PaymentMethodFactory;
use App\Helpers\Shipping\Strategies\DhlStrategy;
use App\Helpers\Shipping\Strategies\NovaPostaStrategy;
use App\Helpers\Shipping\Strategies\PonyExpressStrategy;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * @throws Exception
     */
    public function showCost(Request $request, Order $order)
    {
        $shippingType = $request->input('shipping_type') ?? 'nova-poshta';
        switch ($shippingType) {
            case 'nova-poshta':
                $shippingStrategy = new NovaPostaStrategy();
                break;
            case 'dhl':
                $shippingStrategy = new DhlStrategy();
                break;
            case 'pony-express':
                $shippingStrategy = new PonyExpressStrategy();
                break;
            default:
                throw new Exception('Shipping type not selected');
        }
        $addressA = $request->input('addressA');
        $addressB = $request->input('addressB');
        return $shippingStrategy->calculateShippingCost($addressA, $addressB, $order);
    }

    /**
     * @throws Exception
     */
    public function payment(Request $request, Order $order)
    {
        $paymentType = $request->input('payment_type') ?? 'credit-card';
        $factory = PaymentMethodFactory::createPaymentMethodFactory($paymentType);
        if ($factory) {
            $paymentMethod = $factory->createPaymentMethod();
            if ($paymentMethod) {
                $paymentMethod->pay();
            } else {
                throw new Exception("Failed to create PaymentMethod.");
            }
        } else {
            throw new Exception("Failed to create PaymentMethodFactory for payment type: " . $paymentType);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     * @return Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
