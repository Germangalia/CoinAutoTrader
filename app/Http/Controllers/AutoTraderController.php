<?php

namespace App\Http\Controllers;

use App\AccountsCoinBase;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseBuys;
use App\CoinBaseAPI\CoinBaseSells;
use App\TradeCalculator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\PartialsAutoTrader\GetActiveAccounts;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;


class AutoTraderController extends Controller
{

    public function execute()
    {

        //Get all active accounts from database.

        $accountsClass = new GetActiveAccounts();
        $activeAccounts = $accountsClass->getAccounts();

        //dd($activeAccounts);   //OK

        foreach($activeAccounts as $activeAccount)
        {
            //Get user from account and account atributes
            $DBuserId = $activeAccount->user_id;
            $DBaccountId = $activeAccount->id;
            $accountId = $activeAccount->account_id;
            $wallet_address = $activeAccount->wallet_address;

            //dd($accountId);     //OK

            //Get last history record from account and keep atributes.
            try{
            $lastHistoryRecord = DB::table('trade_histories')->where('account_id', $accountId)->orderBy('updated_at', 'desc')->take(1)->get();
            } catch (Exception $e){
                echo 'Error: Get last history record from account and keep atributes -> AutoTraderController';
            }
            dd($lastHistoryRecord);

            $capital = $lastHistoryRecord->capital_amount;
            $lastPortafolioControl = $lastHistoryRecord->portfolio_control;
            $lastMarketOrder = $lastHistoryRecord->market_order;

            //Extract data from user
            try{
                $userAtributes = DB::table('users')->where('id', $DBuserId)->orderBy('updated_at', 'desc')->take(1)->get();
            } catch (Exception $e){
                echo 'Error: Extract data from user -> AutoTraderController';
            }


            //dd($userAtributes);

            $apiKey = $userAtributes->coinbase_api_key;
            $apiSecret = $userAtributes->coinbase_api_secret;

            //Create client and account
            $authenticator = new CoinBaseAuthentication();
            $client = $authenticator->apiKeyAuthentication($apiKey, $apiSecret);
            $accounter = new AccountsCoinBase();
            $account = $accounter->getAccountDetails($client, $accountId);

            //dd($account);

            //Create object AutoTrader
            try{
                $autoTrader = new \AutoTrader($client, $account, $lastHistoryRecord);
                $autoTrader->setCoinPrice();
                $autoTrader->setCoinsValue();
                $autoTrader->setCfav();
                $autoTrader->setPortfolioControl();
                $autoTrader->setBuyOrSellAdvice();
                $autoTrader->setMarketOrder();
                $autoTrader->setCoinMarketOrder();
                $autoTrader->setCommission();
                $autoTrader->setCoinsAmount();
                $autoTrader->setCapitalAmount();
                $autoTrader->setTotalAmount();
                $autoTrader->setBenefit();
            } catch (Exception $e){
                echo 'Error: Create object AutoTrader -> AutoTraderController';
            }




            //Keep object to Calculator table
            try{
                $calculatorRecord = new TradeCalculator();

                $calculatorRecord->user_id = $DBuserId;
                $calculatorRecord->account_id = $DBaccountId;
                $calculatorRecord->initial_capital = $lastHistoryRecord->initial_capital;
                $calculatorRecord->coin_price = $autoTrader->getCoinPrice();
                $calculatorRecord->coins = $autoTrader->getCoins();
                $calculatorRecord->coins_value = $autoTrader->getCoinsValue();
                $calculatorRecord->cfav = $autoTrader->getCfav();
                $calculatorRecord->capital = $autoTrader->getCapital();
                $calculatorRecord->portfolio_control = $autoTrader->getPortfolioControl();
                $calculatorRecord->buy_sell_advice = $autoTrader->getBuyOrSellAdvice();
                $calculatorRecord->market_order = $autoTrader->getMarketOrder();
                $calculatorRecord->coin_market_order = $autoTrader->getCoinMarketOrder();
                $calculatorRecord->commission = $autoTrader->getCommission();
                $calculatorRecord->coins_amount = $autoTrader->getCoinsAmount();
                $calculatorRecord->capital_amount = $autoTrader->getCapitalAmount();
                $calculatorRecord->total_amount = $autoTrader->getTotalAmount();
                $calculatorRecord->benefit = $autoTrader->getBenefit();

                $calculatorRecord->save();
            } catch (Exception $e){
                echo 'Error: Keep object to Calculator table -> AutoTraderController';
            }



            //Create new $autoTrader and $calculatorRecord for another API markets for trade
            //TODO IN PRODUCTION -> Need another API markets for trade with coins


            //Compare another Market Places
            //TODO IN PRODUCTION -> Need another API markets for trade with coins


            //Buy or sell coins
            //TODO IN PRODUCTION -> Need active bank account (Not available in CoinBase API Sandbox)
            //TEST
            $calculatorData = TradeCalculator::find($calculatorRecord->id);
            $amount = $calculatorData->coin_market_order;

            //dd($amount);

            $operation = false;
            if($amount > 0)
            {
                //Buy Coins
                $buyer = new CoinBaseBuys();
                $operation = $buyer->buyBitcoins($client, $account, $amount);

            } elseif($amount < 0)
            {
                //Sell Coins
                $amount = abs($amount);

                $seller = new CoinBaseSells();
                $operation = $seller->sellBitcoins($client, $account, $amount);
            }

            //dd($operation);


            if($operation){
                //Actualize account balance
                try{
                    $accountData = AccountsCoinBase::find($DBaccountId);
                    $accountData->balance = $calculatorRecord->total_amount;
                    $accountData->save();
                } catch (Exception $e){
                    echo 'Error: Actualize account balance -> AutoTraderController';
                }

                //Keep to history table
                try{
                    $histoyRecord = new TradeCalculator();

                    $histoyRecord->user_id = $DBuserId;
                    $histoyRecord->account_id = $DBaccountId;
                    $histoyRecord->initial_capital = $lastHistoryRecord->initial_capital;
                    $histoyRecord->coin_price = $calculatorData->coin_price;
                    $histoyRecord->coins = $calculatorData->coins;
                    $histoyRecord->coins_value = $calculatorData->coins_value;
                    $histoyRecord->cfav = $calculatorData->cfav;
                    $histoyRecord->capital = $calculatorData->capital;
                    $histoyRecord->portfolio_control = $calculatorData->portfolio_control;
                    $histoyRecord->buy_sell_advice = $calculatorData->buy_sell_advice;
                    $histoyRecord->market_order = $calculatorData->market_order;
                    $histoyRecord->coin_market_order = $calculatorData->coin_market_order;
                    $histoyRecord->commission = $calculatorData->commission;
                    $histoyRecord->coins_amount = $calculatorData->coins_amount;
                    $histoyRecord->capital_amount = $calculatorData->capital_amount;
                    $histoyRecord->total_amount = $calculatorData->total_amount;
                    $histoyRecord->benefit = $calculatorData->benefit;

                    $histoyRecord->save();
                } catch (Exception $e){
                    echo 'Error; Keep to history table -> AutoTraderController';
                }


            }

            //Erase Record from Calculator table
            try{
                TradeCalculator::destroy($calculatorRecord->id);
            } catch (Exception $e){
                echo 'Error: Erase Record from Calculator table -> AutoTraderController';
            }

        }

    }
}
