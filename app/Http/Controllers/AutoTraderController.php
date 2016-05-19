<?php

namespace App\Http\Controllers;

use App\AccountsCoinBase;
use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseBuys;
use App\CoinBaseAPI\CoinBaseMarketData;
use App\CoinBaseAPI\CoinBaseSells;
use App\Http\Controllers\PartialsAutoTrader\CodeRefactorManager;
use App\Http\Controllers\PartialsAutoTrader\CoinBaseManager;
use App\Http\Controllers\PartialsAutoTrader\DatabaseManager;
use App\TradeCalculator;
use App\Trader\AutoTrader;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\PartialsAutoTrader\GetActiveAccounts;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;


class AutoTraderController extends Controller
{

    /**
     * @var GetActiveAccounts
     */
    private $getActiveAccounts;


    /**
     * @var DatabaseManager
     */
    private $databaseManager;


    /**
     * @var CoinBaseManager
     */
    private $coinBaseManager;


    /**
     * @var CodeRefactorManager
     */
    private $codeRefactorManager;


    /**
     * @var CoinBaseMarketData
     */
    private $coinBaseMarketData;


    /**
     * @var CoinBaseAccounts
     */
    private $coinBaseAccounts;


    /**
     * AutoTraderController constructor.
     * @param GetActiveAccounts $getActiveAccounts
     * @param DatabaseManager $databaseManager
     * @param CoinBaseManager $coinBaseManager
     * @param CodeRefactorManager $codeRefactorManager
     * @param CoinBaseMarketData $coinBaseMarketData
     * @param CoinBaseAccounts $coinBaseAccounts
     */
    public function __construct(GetActiveAccounts $getActiveAccounts, DatabaseManager $databaseManager, CoinBaseManager $coinBaseManager, CodeRefactorManager $codeRefactorManager, CoinBaseMarketData $coinBaseMarketData, CoinBaseAccounts $coinBaseAccounts)
    {
        $this->getActiveAccounts = $getActiveAccounts;
        $this->databaseManager = $databaseManager;
        $this->coinBaseManager = $coinBaseManager;
        $this->codeRefactorManager = $codeRefactorManager;
        $this->coinBaseMarketData = $coinBaseMarketData;
        $this->coinBaseAccounts = $coinBaseAccounts;
    }

    /**
     *Execute the trader automatic operation for all active accounts.
     */
    public function execute()
    {
        //Get all active accounts from database.
        $activeAccounts = $this->getActiveAccounts->getAccounts();

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
            $lastHistoryRecord = $this->databaseManager->getLastHistoryRecord($DBaccountId);

            //dd($lastHistoryRecord); //OK

            //Extract data from user
            $userAtributes = $this->databaseManager->getuserAttributes($DBuserId);

//            dd($userAtributes); //OK

            $apiKey = $userAtributes[0]->coinbase_api_key;
            $apiSecret = $userAtributes[0]->coinbase_api_secret;

//            dd($apiSecret); //Ok

            //Create client and get account
            $client = $this->coinBaseManager->createClientFromKeys($apiKey, $apiSecret);
            $account = $this->coinBaseManager->getAccountById($client, $accountId);

            //dd($account); //ok

            //Create object AutoTrader
            $autoTrader = new AutoTrader($client, $account, $lastHistoryRecord, $this->coinBaseMarketData, $this->coinBaseAccounts);
            $autoTrader->setCoinPrice();
            $autoTrader->setCoinsValue();
            $autoTrader->setCfav();
            $autoTrader->setPortafolioControl();
            $autoTrader->setBuyOrSellAdvice();
            $autoTrader->setMarketOrder();
            $autoTrader->setCoinMarketOrder();
            $autoTrader->setCommission();
            $autoTrader->setCoinsAmount();
            $autoTrader->setCapitalAmount();
            $autoTrader->setTotalAmount();
            $autoTrader->setBenefit();

            //dd($autoTrader);  //OK

            //Keep object to Calculator table
            //TODO IN PRODUCTION -> Improve TradeCalculator for multiple coin market providers.
            //$this->databaseManager->insertCalculator($DBuserId, $DBaccountId, $lastHistoryRecord, $autoTrader);

            //Create new $autoTrader and $calculatorRecord for another API markets for trade
            //TODO IN PRODUCTION -> Need another API markets for trade with coins

            //Compare another Market Places
            //TODO IN PRODUCTION -> Need another API markets for trade with coins

            //Buy or sell coins
            //TODO IN PRODUCTION -> Need active bank account (Not available in CoinBase API Sandbox)

            //Get last calculator record
            //TODO IN PRODUCTION -> Improve TradeCalculator for multiple coin market providers.
            //$lastCalculatorRecord = $this->databaseManager->getLastCalculatorRecord();

            //dd($lastCalculatorRecord);    //OK

            $amount = $autoTrader->getCoinMarketOrder();

            //TODO IN PRODUCTION -> Activate Buy and Sell in CodeRefactorManager.php
            $this->codeRefactorManager->setTradeOperation($client, $account, $amount, $DBuserId, $DBaccountId,$lastHistoryRecord, $autoTrader);

//            //Keep object to Calculator table
//            $this->databaseManager->insertHistoryByObject($DBuserId, $DBaccountId, $lastHistoryRecord, $autoTrader);

            //Erase Record from Calculator table
            //TODO IN PRODUCTION -> Improve TradeCalculator for multiple coin market providers.
            //TradeCalculator::destroy($lastCalculatorRecord[0]->id);
        }
    }
}
