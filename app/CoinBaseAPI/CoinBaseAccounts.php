<?php

namespace App\CoinBaseAPI;

use Coinbase\Wallet\Resource\Account;

class CoinBaseAccounts
{
    //Create a new account
    public function createAccount($client, $title)
    {
        // Generate a new bitcoin account for your client:
        $account = new Account();
        $account->setName($title);
        $client->createAccount($account);

        return $account;
    }

    //Get balance of acount
    public function balanceAccount($client, $account)
    {
        $balance = 0.0;
        if (!is_null($account)) {
            // After some time, the transaction should complete and your balance should update
            $client->refreshAccount($account);

            $balance = $account->getBalance();
            //echo $this->account->getName() . ": " . $this->balance->getAmount() . $this->balance->getCurrency() .  "\r\n";
        } 

        return $balance;
    }

    //List all accounts
    public function getAllAccounts($client)
    {
        $accounts = $client->getAccounts();

        return $accounts;
    }

    //List account details
    public function getAccountDetails($client, $accountId)
    {
        $account = $client->getAccount($accountId);

        return $account;
    }

    //List primary account details
    public function getPrimaryAccountDetails($client)
    {
        $account = $client->getPrimaryAccount();

        return $account;
    }

    //Set account as primary
    public function setAccountAsPrimary($client, $account)
    {
        $client->setPrimaryAccount($account);
    }

    //Update an account
    public function updateAccount($client, $account)
    {
        $account->setName('New Account Name');
        $client->updateAccount($account);
    }

    //Delete an account
    public function deleteAccount($client, $account)
    {
        $client->deleteAccount($account);
    }
}
