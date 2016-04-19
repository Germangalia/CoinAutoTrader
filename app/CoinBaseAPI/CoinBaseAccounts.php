<?php

use Coinbase\Wallet\Resource\Account;

class CoinBaseAccounts
{
    //Client authenticated
    protected $client;

    //Account
    protected $account;

    /**
     * CoinBaseAccounts constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }


    public function createAccount()
    {
        // Generate a new bitcoin account for your client:
        $account = new Account();
        $account->setName('New Wallet');
        $this->client->createAccount($this->account);

    }

}