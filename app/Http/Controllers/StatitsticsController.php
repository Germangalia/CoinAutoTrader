<?php

namespace App\Http\Controllers;

use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseMarketData;
use App\TradeHistory;
use Auth;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class StatitsticsController extends Controller
{

    /**
     * Return Statistics Index view
     *
     * @return mixed
     */
    public function index()
    {
        return view('layouts/statistics');
    }

    /**
     * Return Statistics Index view
     *
     * @return mixed
     */
    public function benefitEvolution()
    {
        return view('layouts/benefit_evolution');
    }



    /**
     * Get accounts for user
     *
     * @return mixed
     */
    public function getAccounts()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;
        //Get result
        $result = DB::table('accounts_coin_bases')->where('user_id', $userId)->get();

        return $result;
    }

    /**
     * Get accounts for user
     *
     * @return mixed
     */
    public function countAccounts()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;
        //Get result
        $result = DB::table('accounts_coin_bases')->where('user_id', $userId)->count();

        return $result;
    }


    /**
     * Get history records for user
     *
     * @return mixed
     */
    public function getHistory()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;
        //Get result
        $result = DB::table('trade_histories')->where('user_id', $userId)->get();

        return $result;
    }


    /**
     * Get Actual Bitcoin Price in $
     *
     * @return mixed
     */
    public function getBitcoinPrice()
    {
        //Set Authenticated
        $user = Auth::user();
        $apiKey = $user->apiKey;
        $apiSecret = $user->apiSecret;

        //Set Authenticated
        $authenticator = new CoinBaseAuthentication();
        $client = $authenticator->apiKeyAuthentication($apiKey, $apiSecret);

        //Get result
        $market = new CoinBaseMarketData();
        $result = $market->getBuyPrice($client)->getAmount();

        return $result;
    }


    /**
     * Get sum of active accounts for user
     *
     * @return mixed
     */
    public function countActiveAccounts()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;
        //Get result
        $result = DB::table('accounts_coin_bases')->where('user_id', $userId)->where('active', true)->count();

        return $result;
    }


    /**
     * Get sum of initial capital for all accounts
     *
     * @return mixed
     */
    public function getSumInitialCapital()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;
        //Get result
        $result = DB::table('accounts_coin_bases')->where('user_id', $userId)->sum('initial_capital');

        return $result;
    }

    /**
     * Get capital for all accounts
     *
     * @return mixed
     */
    public function getCapital()
    {
        $row = null;
        $result = 0.0;
        //Select Accounts
        $userAccounts = $this->getAccounts();

        foreach($userAccounts as $userAccount){
            //Get result
            $row = TradeHistory::where('account_id', $userAccount->id)->get()->sort()->last();

            if($row){
                $value = floatval($row->capital_amount);
                $result = $result + $value;
            }

        }
        return $result;
    }


    /**
     * Get bitcoins for all accounts
     *
     * @return mixed
     */
    public function getBitcoins()
    {
        $row = null;
        $result = 0.0;
        //Select Accounts
        $userAccounts = $this->getAccounts();

        foreach($userAccounts as $userAccount){
            //Get result
            $row = TradeHistory::where('account_id', $userAccount->id)->get()->sort()->last();

            if($row){
                $value = floatval($row->coins_amount);
                $result = $result + $value;
            }

        }
        return $result;
    }


    /**
     * Get total amount for all accounts
     *
     * @return mixed
     */
    public function getTotal()
    {
        $row = null;
        $result = 0.0;
        //Select Accounts
        $userAccounts = $this->getAccounts();

        foreach($userAccounts as $userAccount){
            //Get result
            $row = TradeHistory::where('account_id', $userAccount->id)->get()->sort()->last();

            if($row){
                $value = floatval($row->total_amount);
                $result = $result + $value;
            }

        }
        return $result;
    }


    /**
     * Get avg of initial capital for all accounts
     *
     * @return mixed
     */
    public function getAvgInitialCapital()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;
        //Get result
        $result = DB::table('accounts_coin_bases')->where('user_id', $userId)->avg('initial_capital');

        return $result;
    }


    /**
     * Get avg capital for all accounts
     *
     * @return mixed
     */
    public function getAvgCapital()
    {
        //Select Accounts
        $count = $this->countAccounts();

        //Get data
        $sum = $this->getCapital();

        //Get result
        $result = $sum / $count;

        return $result;
    }


    /**
     * Get avg bitcoins for all accounts
     *
     * @return mixed
     */
    public function getAvgBitcoins()
    {
        //Select Accounts
        $count = $this->countAccounts();

        //Get data
        $sum = $this->getBitcoins();

        //Get result
        $result = $sum / $count;

        return $result;
    }


    /**
     * Get avg total amount for all accounts
     *
     * @return mixed
     */
    public function getAvgTotal()
    {
        //Select Accounts
        $count = $this->countAccounts();

        //Get data
        $sum = $this->getTotal();

        //Get result
        $result = $sum / $count;

        return $result;
    }


    /**
     * Get avg benefit for all accounts
     *
     * @return mixed
     */
    public function getAvgBenefit()
    {
        //Select Accounts
        $count = $this->countAccounts();

        //Get data
        $total = $this->getTotal();
        $initial = $this->getSumInitialCapital();

        //Get result
        $result = ($total - $initial) / $initial * 100;

        return $result;
    }

}