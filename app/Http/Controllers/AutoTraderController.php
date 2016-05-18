<?php

namespace App\Http\Controllers;

use App\AccountsCoinBase;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseBuys;
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
     * AutoTraderController constructor.
     * @param GetActiveAccounts $getActiveAccounts
     * @param DatabaseManager $databaseManager
     * @param CoinBaseManager $coinBaseManager
     * @param CodeRefactorManager $codeRefactorManager
     */
    public function __construct(GetActiveAccounts $getActiveAccounts, DatabaseManager $databaseManager, CoinBaseManager $coinBaseManager, CodeRefactorManager $codeRefactorManager)
    {
        $this->getActiveAccounts = $getActiveAccounts;
        $this->databaseManager = $databaseManager;
        $this->coinBaseManager = $coinBaseManager;
        $this->codeRefactorManager = $codeRefactorManager;
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

//            $capital = $lastHistoryRecord->capital_amount;
//            $lastPortafolioControl = $lastHistoryRecord->portfolio_control;
//            $lastMarketOrder = $lastHistoryRecord->market_order;

            //Extract data from user
            $userAtributes = $this->databaseManager->getuserAttributes($DBuserId);

            //dd($userAtributes); //OK

            $apiKey = $userAtributes->coinbase_api_key;
            $apiSecret = $userAtributes->coinbase_api_secret;

            //Create client and get account
            $client = $this->coinBaseManager->createClientFromKeys($apiKey, $apiSecret);
            $account = $this->coinBaseManager->getAccountById($client, $accountId);

            //dd($account); //ok

            //Create object AutoTrader
            $autoTrader = new AutoTrader($client, $account, $lastHistoryRecord);
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

            dd($autoTrader);

            //Keep object to Calculator table
            $this->databaseManager->insertCalculator($DBuserId, $DBaccountId, $lastHistoryRecord, $autoTrader);

            //Create new $autoTrader and $calculatorRecord for another API markets for trade
            //TODO IN PRODUCTION -> Need another API markets for trade with coins

            //Compare another Market Places
            //TODO IN PRODUCTION -> Need another API markets for trade with coins

            //Buy or sell coins
            //TODO IN PRODUCTION -> Need active bank account (Not available in CoinBase API Sandbox)
            //TEST
            $calculatorData = TradeCalculator::find(1);
            $amount = $calculatorData->coin_market_order;

            //dd($amount);

            $this->codeRefactorManager->setTradeOperation($client, $account, $amount, $DBuserId, $DBaccountId,$lastHistoryRecord, $autoTrader);

            //Erase Record from Calculator table
            TradeCalculator::destroy(1);

        }

    }
}
