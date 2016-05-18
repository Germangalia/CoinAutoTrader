<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 18/05/16
 * Time: 18:16
 */

namespace App\Http\Controllers\PartialsAutoTrader;


use App\TradeHistory;
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
     * CodeRefactorManager constructor.
     * @param DatabaseManager $databaseManager
     * @param CoinBaseManager $coinBaseManager
     * @param FirstHistoryRecord $firstHistoryRecord
     */
    public function __construct(DatabaseManager $databaseManager, CoinBaseManager $coinBaseManager, FirstHistoryRecord $firstHistoryRecord)
    {
        $this->coinBaseManager = $coinBaseManager;
        $this->databaseManager = $databaseManager;
        $this->firstHistoryRecord = $firstHistoryRecord;
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

}