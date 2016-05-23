<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 18/05/16
 * Time: 18:16
 */

namespace App\Http\Controllers\PartialsAutoTrader;


use App\AccountsCoinBase;
use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseBuys;
use App\CoinBaseAPI\CoinBaseMarketData;
use App\CoinBaseAPI\CoinBaseSells;
use App\TradeHistory;
use App\Trader\AutoTrader;
use Vinkla\Alert\Alert;

class CodeRefactorManager
{

    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * @var CoinBaseManager
     */
    private $coinBaseManager;

    /**
     * @var FirstHistoryRecord
     */
    private $firstHistoryRecord;


    /**
     * @var CoinBaseBuys
     */
    private $coinBaseBuys;


    /**
     * @var CoinBaseSells
     */
    private $coinBaseSells;


    private $coinBaseMarketData;


    private $coinBaseAccounts;



    public function __construct(DatabaseManager $databaseManager, CoinBaseManager $coinBaseManager, FirstHistoryRecord $firstHistoryRecord, CoinBaseBuys $coinBaseBuys, CoinBaseSells $coinBaseSells, CoinBaseMarketData $coinBaseMarketData, CoinBaseAccounts $coinBaseAccounts)
    {
        $this->coinBaseManager = $coinBaseManager;
        $this->databaseManager = $databaseManager;
        $this->firstHistoryRecord = $firstHistoryRecord;
        $this->coinBaseBuys = $coinBaseBuys;
        $this->coinBaseSells = $coinBaseSells;
        $this->coinBaseMarketData = $coinBaseMarketData;
        $this->coinBaseAccounts = $coinBaseAccounts;
    }


    /**
     * Check if the acount is active
     * @param $id
     * @param $accountRecord
     */
    public function checkActiveAccount($id, $accountRecord)
    {

        //Get values
        $accountActive = $accountRecord->active;
        $accountCapital = $accountRecord->initial_capital;

        //Check active account
        if($accountActive == 0){

            //Coin Base authentication


            //TODO PRODUCTION -> Get $balanceAmount
            //$balance = $accounter->balanceAccount($client, $account);
            //$balanceAmount = $balance->getAmount();
            //TEST
            $balanceAmount = ($accountCapital/2) + 1;

            $this->checkBalance($id, $balanceAmount, $accountCapital);

            //Activate to true
            $this->databaseManager->updateActive($id, true);

            //Send alert to view
            Alert::success('The account is activate to trade.');


        }else{
            //Activate to false
            $this->databaseManager->updateActive($id, false);

            //Send alert to view
            Alert::warming('The account is disable to trade.');
        }
    }


    /**
     * Check if the balance is correct
     * @param $id
     * @param $balanceAmount
     * @param $accountCapital
     */
    public function checkBalance($id, $balanceAmount, $accountCapital)
    {
        if(($balanceAmount >= ($accountCapital*0.50) && ($balanceAmount <= ($accountCapital*0.8)))){
            //Activate account
            $this->databaseManager->updateBalance($id, $balanceAmount);
            $this->databaseManager->updateActive($id, true);

            //Make first record in history table
            $historyRecord =  TradeHistory::find($id);

            $this->checkHistoryRecord($historyRecord, $id, $accountCapital, $balanceAmount);
        }
    }


    /**
     * Check the records history of account
     * @param $historyRecord
     * @param $id
     * @param $accountCapital
     * @param $balanceAmount
     */
    public function checkHistoryRecord($historyRecord, $id, $accountCapital, $balanceAmount)
    {
        if(is_null($historyRecord) || empty($historyRecord) ){

            //Create client Coin Base
            $client = $this->coinBaseManager->createClientFromUser();

            //Make the first history table record
            $this->firstHistoryRecord->makeFirstRecord($id, $client, $accountCapital, $balanceAmount);

        }
    }


    /**
     * Execute the trade operation
     * @param $client
     * @param $account
     * @param $amount
     * @param $DBuserId
     * @param $DBaccountId
     * @param $balanceAmount
     * @param $lastHistoryRecord
     * @param $autoTrader
     */
    public function setTradeOperation($client, $account, $amount, $DBuserId, $DBaccountId, $lastHistoryRecord, $autoTrader)
    {
        $operation = false;
        if($amount > 0)
        {
            //TODO IN PRODUCTION - Buy Coins
            //$operation = $this->coinBaseBuys->buyBitcoins($client, $account, $amount);
            $operation = true;

        } elseif($amount < 0)
        {
            //TODO IN PRODUCTION - Sell Coins
            //$amount = abs($amount);
            //$operation = $this->coinBaseSells->sellBitcoins($client, $account, $amount);
            $operation = false;
        }

        //dd($operation);

        if($operation){
            //Actualize account balance
            $balance = $autoTrader->getTotalAmount();
            $this->databaseManager->updateBalance($DBaccountId, $balance);

            //Keep to history table
            $this->databaseManager->insertHistoryByObject($DBuserId, $DBaccountId, $lastHistoryRecord, $autoTrader);

        }
    }


    public function createAutoTrader($client, $account, $lastHistoryRecord)
    {
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

        return $autoTrader;
    }

}