<?php

use Coinbase\Wallet\Resource\Buy;
use Coinbase\Wallet\Enum\Param;

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
        $buy->setBitcoinAmount($amount);

        $client->createAccountBuy($account, $buy, [Param::COMMIT => false]);
        $client->commitBuy($buy);
    }

}