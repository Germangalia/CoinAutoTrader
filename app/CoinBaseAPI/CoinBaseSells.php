<?php
namespace App\CoinBaseAPI;

use Coinbase\Wallet\Resource\Sell;
use Coinbase\Wallet\Enum\Param;

class CoinBaseSells
{

    //List sells
    public function getSells($client, $account)
    {
        $sells = $client->getAccountSells($account);
        return $sells;
    }


    //Get sell info
    public function getSellInfo($client, $account, $sellId)
    {
        $sell = $client->getAccountSell($account, $sellId);
        return $sell;
    }


    //Sell bitcoins
    public function sellBitcoins($client, $account, $amount)
    {
        //TODO IN PRODUCTION (Try-Catch and control the exceptions)
        $sell = new Sell();
        $sell->setBitcoinAmount($amount);

        $client->createAccountSell($account, $sell, [Param::COMMIT => false]);
        //Commit a sell
        //You only need to do this if you pass commit=false when you create the sell.
        $client->commitSell($sell);

        return true;
    }

}