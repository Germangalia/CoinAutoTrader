<?php

namespace App\CoinBaseAPI;

class CoinBaseMerchant
{
    //Get merchant
    public function getMerchant($client, $merchantId)
    {
        $merchant = $client->getMerchant($merchantId);

        return $merchant;
    }

    //Verifying merchant callbacks
    //Note: Only production callbacks can be verified. Callbacks issued by the sandbox will always return false below.
    public function verifyingMerchantCallbacks($client)
    {
        $raw_body = file_get_contents('php://input');
        $signature = $_SERVER['HTTP_CB_SIGNATURE'];
        $authenticity = $client->verifyCallback($raw_body, $signature); // boolean
        return $authenticity;
    }
}
