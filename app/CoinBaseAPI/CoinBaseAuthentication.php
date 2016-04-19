<?php

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Enum\Param;
use Coinbase\Wallet\Exception\TwoFactorRequiredException;
use Coinbase\Wallet\Resource\Transaction;

class CoinBaseAuthentication
{
    //Client
    protected $client;

    //Configuration of Authentication
    private $configuration;


    public function ApiKeyAuthentication($apiKey, $apiSecret)
    {
        //Authentication with API key and API Secret
        $this->configuration = Configuration::apiKey($apiKey, $apiSecret);
        //Using sandbox CoinBase
        $this->configuration->setApiUrl(Configuration::SANDBOX_API_URL);
        $this->client = Client::create($this->configuration);
        return $this->client;
    }


    public function OAuth2Authentication($accessToken, $refreshToken)
    {
        //Authentication with OAuth2 Token
        if($refreshToken != null)
        {
            // with a refresh token
            $this->configuration = Configuration::oauth($accessToken, $refreshToken);
        } else{
            // without a refresh token
            $this->configuration = Configuration::oauth($accessToken);
        }

        $this->client = Client::create($this->configuration);
        return $this->client;
    }


    public function TwoFactorAuthentication()
    {
        //Authentication in tho factors
        $transaction = Transaction::send([
            'toEmail' => 'test@test.com',
            'bitcoinAmount' => 1
        ]);

        $account = $this->client->getPrimaryAccount();
        try {
            $this->client->createAccountTransaction($account, $transaction);
        } catch (TwoFactorRequiredException $e) {
            // show 2FA dialog to user and collect 2FA token

            // retry call with token
            $this->client->createAccountTransaction($account, $transaction, [
                Param::TWO_FACTOR_TOKEN => '123456',
            ]);
        }
        return $this->client;
    }
}