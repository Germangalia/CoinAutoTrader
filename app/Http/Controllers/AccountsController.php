<?php

namespace App\Http\Controllers;

use App\AccountsCoinBase;
use Auth;
use Illuminate\Http\Request;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseAccounts;
use App\Http\Requests;

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

    public function createAccount(Requests $requests)
    {

        //Select Authenticated user
        $user = Auth::user();

        $apiKey = $user->coinbase_api_key;
        $apiSecret = $user->coinbase_api_secret;

        //Create client
        $client = apiKeyAuthentication($apiKey, $apiSecret);

        //Create account
        $account = createAccount($client, $requests->title);

        //Save to database
        $dataAccount = new AccountsCoinBase();

        $dataAccount->name = $requests->title;
        $dataAccount->user_id = $user->id;
        $dataAccount->user_id = $account;

        $dataAccount->save;

    }

}
