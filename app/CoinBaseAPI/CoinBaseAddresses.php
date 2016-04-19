<?php

use Coinbase\Wallet\Resource\Address;

class CoinBaseAddresses
{

    //Client authenticated
    protected $client;

    //Account
    protected $account;

    //Address
    protected $address;

    /**
     * CoinBaseAddresses constructor.
     * @param $client
     * @param $account
     * @param $address
     */
    public function __construct($client, $account)
    {
        $this->client = $client;
        $this->account = $account;
    }

    public function createAddress()
    {
        // Generate a new bitcoin address for your account:
        $address = new Address();
        $this->client->createAccountAddress($this->account, $this->address);
    }


}