<?php

namespace App\Http\Controllers;

use App\AccountsCoinBase;
use Auth;
use Crypt;
use Illuminate\Http\Request;


class AccountsController extends Controller
{

    /*
     * View the acounts blade
     */

    public function index()
    {

        return view('layouts/accounts');
    }


    /*
     * Create new account
     */

    public function createAccount( Request $requests)
    {

        //Select Authenticated user
        $user = Auth::user();

        $apiKey = $user->coinbase_api_key;
        $apiSecret = $user->coinbase_api_secret;

        dd($apiKey);

        //Create client
//        $client = \App\CoinBaseAPI\CoinBaseAuthentication::class->apiKeyAuthentication($apiKey, $apiSecret);
//
//        //Create account
//        $account = \App\CoinBaseAPI\CoinBaseAccounts::class->createAccount($client, $requests->title);
//
//        //Save to database
//        $dataAccount = new AccountsCoinBase();
//
//        $dataAccount->name = $requests->title;
//        $dataAccount->user_id = $user->id;
//        $dataAccount->user_id = $account;
//
//        $dataAccount->save;

    }

}
