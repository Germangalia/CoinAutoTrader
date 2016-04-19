<?php
namespace App\CoinBaseAPI;

class CoinBaseMarketData
{

    //List supported native currencies
    public function getNativeCurrencies($client)
    {
        $currencies = $client->getCurrencies();
        return $currencies;
    }

    //List exchange rates
    public function getExchangeRates($client)
    {
        $rates = $client->getExchangeRates();
        return $rates;
    }

    //Buy price
    public function getBuyPrice($client)
    {
        $buyPrice = $client->getBuyPrice();
        return $buyPrice;
    }


    //Sell price
    public function getSellPrice($client)
    {
        $sellPrice = $client->getSellPrice();
        return $sellPrice;
    }


    //Spot price
    public function getSpotPrice($client)
    {
        $spotPrice = $client->getSpotPrice();
        return $spotPrice;
    }


    //Current server time
    public function getServerTime($client)
    {
        $time = $client->getTime();
        return $time;
    }


}