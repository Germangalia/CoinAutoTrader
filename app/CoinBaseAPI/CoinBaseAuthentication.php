<?php

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;

class CoinBaseAuthentication
{
    public function Authentication(){
        $configuration = Configuration::apiKey($apiKey, $apiSecret);
        $configuration->setApiUrl(Configuration::SANDBOX_API_URL);
        $client = Client::create($configuration);
        return $client;
    }
}