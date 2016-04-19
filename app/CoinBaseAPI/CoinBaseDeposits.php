<?php
namespace App\CoinBaseAPI;

use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Deposit;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Enum\Param;

class CoinBaseDeposits
{

    //List deposits
    public function getDeposits($client, $account)
    {
        $deposits = $client->getAccountDeposits($account);
        return $deposits;
    }


    //Get deposit info
    public function getDepositInfo($client, $account, $depositId)
    {
        $deposit = $client->getDeposit($account, $depositId);
        return $deposit;
    }


    //Deposit funds
    public function setDepositFounds($client, $account, $amount)
    {
        $deposit = new Deposit();
        $deposit->setAmount($amount, CurrencyCode::BTC);

        $client->createAccountDeposit($account, $deposit);

        //Commit a deposit
        //You only need to do this if you pass commit=false when you create the deposit.
        //$client->createAccountDeposit($account, $deposit, [Param::COMMIT => false]);
        //$client->commitDeposit($deposit);
    }


}