<?php
namespace App\CoinBaseAPI;

use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Transaction;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Resource\Account;

class CoinBaseTransactions
{

    // Send coins from the account to primary account:
    public function setTransaction($client, $address, $primaryAccount, $amount)
    {
        $transaction = Transaction::send();
        $transaction->setToBitcoinAddress($address->getAddress());
        $transaction->setAmount(new Money($amount, CurrencyCode::BTC));
        $transaction->setDescription('For being awesome!');
        if($amount < 0.0001)
        {
            $transaction->setFee(0.0001);
        }

        $client->createAccountTransaction($primaryAccount, $transaction);
        print_r($transaction);
    }


    //List transactions
    public function getTransactions($client, $account)
    {
        $transactions = $client->getAccountTransactions($account);
        return $transactions;
    }


    //Get transaction info
    public function getTransactionInfo($client, $account, $transactionId)
    {
        $transaction = $client->getAccountTransaction($account, $transactionId);
        return $transaction;
    }


    //Transfer funds to a new account
    public function setTransferFoundsToNewAccount($client, $accountId, $toAccount, $amount)
    {
        $fromAccount = Account::reference($accountId);

        $toAccount = new Account([
            'name' => 'New Account'
        ]);
        $client->createAccount($toAccount);

        $transaction = Transaction::transfer([
            'to'            => $toAccount,
            'bitcoinAmount' => $amount,
            'description'   => 'Your first bitcoin!'
        ]);

        $client->createAccountTransaction($fromAccount, $transaction);
    }


    //Request funds
    public function getRequestFounds($client, $amount)
    {
        $transaction = Transaction::request([
            'amount'      => new Money($amount, CurrencyCode::BTC),
            'description' => 'Burrito'
        ]);

        $client->createAccountTransaction($transaction);
    }




    //Resend request
    public function resendRequest($account, $transaction)
    {
        $account->resendTransaction($transaction);
    }


    //Cancel request
    public function cancelRequest($account, $transaction)
    {
        $account->cancelTransaction($transaction);
    }


    //Fulfill request
    public function fulfillRequest($account,$transaction)
    {
        $account->completeTransaction($transaction);
    }


}