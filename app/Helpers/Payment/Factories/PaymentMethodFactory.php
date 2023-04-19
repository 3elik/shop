<?php

namespace App\Helpers\Payment\Factories;

class PaymentMethodFactory
{
    public static function createPaymentMethodFactory($paymentType)
    {
        switch ($paymentType) {
            case 'credit-card':
                return new CreditCardPaymentMethodFactory();
                break;
            case 'paypal':
                return new PayPalPaymentMethodFactory();
                break;
            case 'bank':
                return new BankTransferPaymentMethodFactory();
                break;
            case 'stripe':
                return new StripePaymentMethodFactory();
                break;
            default:
                return null;
        }
    }
}
