<?php
namespace App\CoinBaseAPI;

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Enum\Param;
use Coinbase\Wallet\Exception\TwoFactorRequiredException;
use Coinbase\Wallet\Resource\Transaction;

class CoinBaseAuthentication
{

    public function apiKeyAuthentication($apiKey, $apiSecret)
    {
        //Authentication with API key and API Secret
        $configuration = Configuration::apiKey($apiKey, $apiSecret);
        //Using sandbox CoinBase
        $configuration->setApiUrl(Configuration::SANDBOX_API_URL);
        $client = Client::create($configuration);
        return $client;
    }


    public function oAuth2Authentication($accessToken, $refreshToken)
    {
        //Authentication with OAuth2 Token
        if($refreshToken != null)
        {
            // with a refresh token
            $configuration = Configuration::oauth($accessToken, $refreshToken);
        } else{
            // without a refresh token
            $configuration = Configuration::oauth($accessToken);
        }

        $client = Client::create($configuration);
        return $client;
    }


    public function twoFactorAuthentication($client)
    {
        //Authentication in tho factors
        $transaction = Transaction::send([
            'toEmail' => 'test@test.com',
            'bitcoinAmount' => 1
        ]);

        $account = $client->getPrimaryAccount();
        try {
            $client->createAccountTransaction($account, $transaction);
        } catch (TwoFactorRequiredException $e) {
            // show 2FA dialog to user and collect 2FA token

            // retry call with token
            $client->createAccountTransaction($account, $transaction, [
                Param::TWO_FACTOR_TOKEN => '123456',
            ]);
        }
        return $client;
    }
}