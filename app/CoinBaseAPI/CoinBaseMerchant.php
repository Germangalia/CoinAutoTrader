<?php


class CoinBaseMerchant
{

    //Get merchant
    public function getMerchant($client, $merchantId)
    {
        $merchant = $client->getMerchant($merchantId);
        return $merchant;
    }

}