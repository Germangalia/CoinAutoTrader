<?php
namespace App\CoinBaseAPI;

class CoinBasePaymentMethods
{

    //List payment methods
    public function getPaymentMethods($client)
    {
        $paymentMethods = $client->getPaymentMethods();
        return $paymentMethods;
    }


    //Get payment method
    public function getPaymentMethodById($client, $paymentMethodId)
    {
        $paymentMethod = $client->getPaymentMethod($paymentMethodId);
        return $paymentMethod;
    }


}