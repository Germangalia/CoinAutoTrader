<?php

namespace App\Http\Controllers;

use App\AccountsCoinBase;
use App\CoinBaseAPI\CoinBaseAuthentication;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\PartialsAutoTrader\GetActiveAccounts;
use Illuminate\Support\Facades\DB;


class AutoTraderController extends Controller
{

    public function execute()
    {

        //Get all active accounts from database.

        $accountsClass = new GetActiveAccounts();
        $activeAccounts = $accountsClass->getAccounts();


        foreach($activeAccounts as $activeAccount)
        {
            //Get user from account and account atributes
            $DBuserId = $activeAccount->user_id;
            $DBaccountId = $activeAccount->id;
            $accountId = $activeAccount->account_id;
            $wallet_address = $activeAccount->wallet_address;
            $balance = $activeAccount->balance;
            $initial_capital = $activeAccount->initial_capital;
            $userId = $activeAccount->user_id;


            //Get last history record from account and keep atributes.
            $lastHistoryRecord = DB::table('trade_histories')->where('account_id', $accountId)->last();

            $capital = $lastHistoryRecord->capital_amount;
            $lastPortafolioControl = $lastHistoryRecord->portfolio_control;
            $lastMarketOrder = $lastHistoryRecord->market_order;

            //Extract data from user
            $userAtributes = DB::table('users')->where('id', $DBuserId)->last();

            $apiKey = $userAtributes->coinbase_api_key;
            $apiSecret = $userAtributes->coinbase_api_secret;

            //Create client and account
            $authenticator = new CoinBaseAuthentication();
            $clientCoinBase = $authenticator->apiKeyAuthentication($apiKey, $apiSecret);
            $accounter = new AccountsCoinBase();
            $accountCoinBase = $accounter->getAccountDetails($clientCoinBase, $accountId);

            $dd($accountCoinBase);

            //Create object AutoTrader



            //Keep object to Calculator table


            //Buy or sell coins



            //Keep to history table


            //Erase Record from Calculator table
        }



    }
}
