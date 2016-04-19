<?php
namespace App\CoinBaseAPI;

use Coinbase\Wallet\Resource\Order;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Enum\CurrencyCode;

class CoinBaseOrders
{

    //List orders
    public function getOrders($client)
    {
        $orders = $client->getOrders();
        return $orders;
    }


    //Get order
    public function getOrderById($client, $orderId)
    {
        $order = $client->getOrder($orderId);
        return $order;
    }


    //Create order
    public function createOrder($client, $amount)
    {
        $order = new Order();
        $order->setName('Order #1234');
        $order->setAmount($amount);

        $client->createOrder($order);
    }


    //Refund order
    public function refundOrder($client, $order)
    {
        $client->refundOrder($order, CurrencyCode::BTC);
    }

}