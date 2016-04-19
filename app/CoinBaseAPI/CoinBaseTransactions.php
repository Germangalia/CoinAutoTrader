<?php

use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Transaction;
use Coinbase\Wallet\Value\Money;

class CoinBaseTransactions
{

    //Client authenticated
    protected $client;

    //Account
    protected $account;

    //Primary account
    protected $primaryAcount;

    //Address
    protected $address;

    /**
     * CoinBaseTransactions constructor.
     * @param $client
     * @param $account
     * @param $primaryAcount
     * @param $address
     */
    public function __construct($client, $account, $primaryAcount, $address)
    {
        $this->client = $client;
        $this->account = $account;
        $this->primaryAcount = $primaryAcount;
        $this->address = $address;
    }


    public function setTransaction($amount)
    {
        // Send coins from the account to primary account:

        $transaction = Transaction::send();
        $transaction->setToBitcoinAddress($this->address->getAddress());
        $transaction->setAmount(new Money($amount, CurrencyCode::BTC));
        $transaction->setDescription('For being awesome!');

        $this->client->createAccountTransaction($this->primaryAccount, $transaction);
        print_r($transaction);
    }

}