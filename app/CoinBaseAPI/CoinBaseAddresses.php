<?php
namespace App\CoinBaseAPI;
use Coinbase\Wallet\Resource\Address;

class CoinBaseAddresses
{

    // Generate a new bitcoin address for your account:
    public function createAddress($client, $account)
    {
        $address = new Address();
        $address->setName('New Address');
        $client->createAccountAddress($account, $address);
        return $address;
    }

    //List receive addresses for account
    public function getAddressForAccount($client, $account)
    {
        $addresses = $client->getAccountAddresses($account);
        return $addresses;
    }


    //Get receive address info
    public function getAddressInfo($client, $account, $addressId)
    {
        $address = $client->getAccountAddress($account, $addressId);
        return $address;
    }


    //List transactiona for address
    public function getAddressTransactions($client, $address)
    {
        $transactions = $client->getAddressTransactions($address);
        return $transactions;
    }

}