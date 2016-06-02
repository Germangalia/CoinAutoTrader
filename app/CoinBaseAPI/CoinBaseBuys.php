<?php

namespace App\CoinBaseAPI;

use Coinbase\Wallet\Enum\Param;
use Coinbase\Wallet\Resource\Buy;

class CoinBaseBuys
{
    //List buys
    public function getBuys($client, $account)
    {
        $buys = $client->getAccountBuys($account);

        return $buys;
    }

    //Get buy info
    public function getBuyInfo($client, $account, $buyId)
    {
        $buy = $client->getAccountBuy($account, $buyId);

        return $buy;
    }

    //Buy bitcoins
    public function buyBitcoins($client, $account, $amount)
    {
        $buy = new Buy();

        //TODO IN PRODUCTION (Try-Catch and control the exceptions)
        $buy->setBitcoinAmount($amount);

        $client->createAccountBuy($account, $buy, [Param::COMMIT => false]);
        //Commit a buy
        //You only need to do this if you pass commit=false when you create the buy.
        $client->commitBuy($buy);


        return true;
    }
}
