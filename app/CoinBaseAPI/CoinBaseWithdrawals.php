<?php
namespace App\CoinBaseAPI;

use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Withdrawal;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Enum\Param;

class CoinBaseWithdrawals
{

    //List withdrawals
    public function getWithdrawals($client, $account)
    {
        $withdrawals = $client->getAccountWithdrawals($account);
        return $withdrawals;
    }


    //Get withdrawal
    public function getWithdrawalById($client, $account, $withdrawalId)
    {
        $withdrawal = $client->getAccountWithdrawal($account, $withdrawalId);
        return $withdrawal;
    }


    //Withdraw funds
    public function setWithdrawFounds($client, $account, $amount)
    {
        $withdrawal = new Withdrawal();
        $withdrawal->setAmount($amount, CurrencyCode::BTC);
        $client->createAccountWithdrawal($account, $withdrawal);

        //Commit a withdrawal
        //You only need to do this if you pass commit=true when you call the withdrawal method.
        //$client->createAccountWithdrawal($account, $withdrawal, [Param::COMMIT => false]);
        //$client->commitWithdrawal($withdrawal);
    }

}