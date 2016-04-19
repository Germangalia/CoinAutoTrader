<?php
namespace App\CoinBaseAPI;

use Coinbase\Wallet\Resource\Checkout;

class CoinBaseCheckouts
{

    //List checkouts
    public function getCheckouts($client)
    {
        $checkouts = $client->getCheckouts();
        return $checkouts;
    }


    //Create checkout
    public function createCheckout($client, $custom_order_id, $amount)
    {
        $checkout = new Checkout();
        $checkout->setName('My Order');
        $checkout->setAmount($amount, CurrencyCode::BTC);
        $checkout->setMetadata(array( 'order_id' => $custom_order_id ));

        $client->createCheckout($checkout);
        $code = $checkout->getEmbedCode();
        $redirect_url = "https://www.coinbase.com/checkouts/$code";
        return $redirect_url;

    }


    //Get checkout
    public function getCheckoutById($client, $checkoutId)
    {
        $checkout = $client->getCheckout($checkoutId);
        return $checkout;
    }


    //Get checkout's orders
    public function getCheckoutsOrders($client, $checkout)
    {
        $orders = $client->getCheckoutOrders($checkout);
        return $orders;
    }


    //Create order for checkout
    public function createOrderForCheckout($client, $checkout)
    {
        $order = $client->createNewCheckoutOrder($checkout);
        return $order;
    }


}