<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 6/05/16
 * Time: 15:40.
 */
namespace App\Http\Controllers\PartialsAutoTrader;

use App\CoinBaseAPI\CoinBaseMarketData;
use Auth;
use Config;

class FirstHistoryRecord
{
    /**
     * @var CoinBaseMarketData
     */
    private $marketData;

    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * FirstHistoryRecord constructor.
     *
     * @param CoinBaseMarketData $marketData
     * @param DatabaseManager    $databaseManager
     */
    public function __construct(CoinBaseMarketData $marketData, DatabaseManager $databaseManager)
    {
        $this->marketData = $marketData;
        $this->databaseManager = $databaseManager;
    }

    /**
     * Make the first record of the account to the database history.
     *
     * @param $accountId
     * @param $client
     * @param $accountCapital
     * @param $balanceAmount
     */
    public function makeFirstRecord($accountId, $client, $accountCapital, $balanceAmount)
    {
        //account_id = $accountId
        //initial_capital = $accountCapital
        //coins = $balanceAmount

        //Convert values
        $accountId = intval($accountId);
        $accountCapital = floatval($accountCapital);
        $balanceAmount = floatval($balanceAmount);

        //Get user_id
        $userId = Auth::user()->id;

        //Get coins
        //$marketData = new CoinBaseMarketData();
        $coinPrice = $this->marketData->getBuyPrice($client);

        //Get coins_value
        $coins = $balanceAmount / $coinPrice;

        //Get CFAV
        $cfav = $balanceAmount * Config::get('constants.CFAV_PERCENT');

        //Get Capital
        $capital = $accountCapital - $balanceAmount;

        //Get prortfolio_control
        $portafolioControl = $balanceAmount;

        //Get buy_sell_advice
        $buySellAdvice = $coins;

        //Get market_order
        $marketOrder = $coins;

        //Get coin_market_order
        $coinMarketOrder = $coins;

        //Get commission
        $commission = 0.0;

         //Get coins amount
        $coinsAmount = $coins;

        //Get capital_amount
        $capitalAmount = $accountCapital - $balanceAmount;

        //Get total_amount
        $totalAmount = ($coinsAmount * $coinPrice) + $capitalAmount;

        //Get benefit
        $benefit = ($totalAmount - $accountCapital) / $accountCapital * 100;

        //Create DB record in trade_histories
        $this->databaseManager->insertHistory($userId, $accountId, $accountCapital, $coinPrice, $coins, $balanceAmount, $cfav, $capital, $portafolioControl, $buySellAdvice, $marketOrder, $coinMarketOrder, $commission, $coinsAmount, $capitalAmount, $totalAmount, $benefit);

        //Update DB Accounts record
        $this->databaseManager->updateBalance($accountId, $totalAmount);
    }
}
