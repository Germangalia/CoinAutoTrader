<?php

use Coinbase\Wallet\Resource\Account;

class CoinBaseAccounts
{
    //Client authenticated
    protected $client;

    //Account
    protected $account;

    //Balance of the account
    protected $balance;

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

    public function balanceAcount()
    {
        // After some time, the transaction should complete and your balance should update
        $this->client->refreshAccount($this->account);

        $this->balance = $this->account->getBalance();
        //echo $this->account->getName() . ": " . $this->balance->getAmount() . $this->balance->getCurrency() .  "\r\n";

    }

}