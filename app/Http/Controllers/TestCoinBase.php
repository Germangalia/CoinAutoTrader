<?php

namespace App\Http\Controllers;

use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAddresses;
use App\CoinBaseAPI\CoinBaseAuthentication;

class TestCoinBase extends Controller
{
    /**
     * Manual test.
     */
    public function testing()
    {
        //Authentication works well
        $auth = new CoinBaseAuthentication();
        $client = $auth->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        dd($client);

//        //Create Acount works well
//        $acco = new CoinBaseAccounts();
//        $account = $acco->createAccount($client);
//        //dd($account);
//
//        //Create Address works well
//        $addr = new CoinBaseAddresses();
//        $addr->createAddress($client, $account);
//        $allAddress = $addr->getAddressForAccount($client, $account);
//        dd($allAddress);
    }
}
