<?php

namespace App\Http\Controllers;

use App\AccountsCoinBase;
use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAddresses;
use App\Http\Controllers\PartialsAutoTrader\FirstHistoryRecord;
use App\TradeHistory;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use App\CoinBaseAPI\CoinBaseAuthentication;
use Illuminate\Support\Facades\DB;


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

    public function activateAccounts($id)
    {

        //Get data from user
        $user = Auth::user();

        $apiKey = $user->coinbase_api_key;
        $apiSecret =  $user->coinbase_api_secret;

        //Get account details
        $accountRecord =  AccountsCoinBase::findOrFail($id);

        $accountActive = $accountRecord->active;
        $accountId = $accountRecord->account_id;
        $accountCapital = $accountRecord->initial_capital;

        if(!$accountActive){
            //Coin Base authentication
            $authentication = new CoinBaseAuthentication();
            $client = $authentication->apiKeyAuthentication($apiKey, $apiSecret);

            $accounter = new CoinBaseAccounts();
            $account = $accounter->getAccountDetails($client, $accountId);

            //Get balance
            $balance = $accounter->balanceAccount($client, $account);
            $balanceAmount = $balance->getAmount();

            if(($balanceAmount >= ($accountCapital*0.5) && ($balanceAmount <= ($accountCapital*0.8)))){
                //Activate account
                $accountRecord->balance = $balanceAmount;
                $accountRecord->active = true;
                $accountRecord->save();
                //DB::table('accounts_coin_bases')->where('id', $id)->update(array('active' => true));

                //Make first record in history table
                $historyRecord =  TradeHistory::find($id);
                if($historyRecord != null){

                    $history = new FirstHistoryRecord();
                    $history->makeFirstRecord($user, $accountId, $client, $account, $accountCapital, $balanceAmount);

                }
            }

        }else{
            //Activate to false
            $accountRecord->active = false;
            $accountRecord->save();
            //DB::table('accounts_coin_bases')->where('id', $id)->update(array('active' => false));
        }

        //Return accounts view
        return view('layouts/accounts');

    }

    public function deleteAccounts($id)
    {

        //Delete from database
        AccountsCoinBase::destroy($id);

        //Return accounts view
        return view('layouts/accounts');
    }

}
