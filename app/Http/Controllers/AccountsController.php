<?php

namespace App\Http\Controllers;

use App\AccountsCoinBase;
use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAddresses;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use App\CoinBaseAPI\CoinBaseAuthentication;


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


        //Create client
        $authentication = new CoinBaseAuthentication();
        $client = $authentication->apiKeyAuthentication($apiKey, $apiSecret);

        //Create account
        $accounter = new CoinBaseAccounts();
        $account = $accounter->createAccount($client, $requests->title);

        //Get Primary Address from account
        $addresser = new CoinBaseAddresses();
        $address = $addresser->createAddress($client, $account);

        //Save to database
        $dataAccount = new AccountsCoinBase();

        $dataAccount->name = $requests->title;
        $dataAccount->user_id = $user->id;
        $dataAccount->account_id = $account->getId();
        $dataAccount->wallet_address = $address->getAddress();
        $dataAccount->balance = $account->getBalance()->getAmount();
        $dataAccount->initial_capital = $requests->initialCapital;
        //TODO put active to false.
        $dataAccount->active = true;

        $dataAccount->save();

        return view('layouts/accounts');
    }

    public function getUserAccounts()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;

        //Get accounts from database
        $userAccounts = DB::table('accounts_coin_bases')->where('user_id', $userId)->get();
        return $userAccounts;
    }

}
