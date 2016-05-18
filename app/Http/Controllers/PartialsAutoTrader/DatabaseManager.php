<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 18/05/16
 * Time: 16:50
 */

namespace App\Http\Controllers\PartialsAutoTrader;


use App\TradeHistory;
use DB;

class DatabaseManager
{

    /**
     * @var TradeHistory
     */
    private $dataHistory;

    /**
     * DatabaseManager constructor.
     */
    public function __construct(TradeHistory $dataHistory)
    {
        $this->dataHistory = $dataHistory;
    }


    /**
     * Actualize the balance in accounts database.
     * @param $accountId
     * @param $totalAmount
     */
    public function ubdateBalance($accountId, $totalAmount)
    {
        DB::table('accounts_coin_bases')->where('id', $accountId)->update(array('balance' => $totalAmount));
    }


    /**
     * Insert data to database History
     * @param $userId
     * @param $accountId
     * @param $accountCapital
     * @param $coinPrice
     * @param $coins
     * @param $balanceAmount
     * @param $cfav
     * @param $capital
     * @param $portafolioControl
     * @param $buySellAdvice
     * @param $marketOrder
     * @param $coinMarketOrder
     * @param $commission
     * @param $coinsAmount
     * @param $capitalAmount
     * @param $totalAmount
     * @param $benefit
     */
    public function insertHistory($userId, $accountId, $accountCapital, $coinPrice, $coins, $balanceAmount, $cfav, $capital, $portafolioControl, $buySellAdvice, $marketOrder, $coinMarketOrder, $commission, $coinsAmount, $capitalAmount, $totalAmount, $benefit)
    {
        $this->dataHistory->user_id = $userId;
        $this->dataHistory->account_id = $accountId;
        $this->dataHistory->initial_capital = $accountCapital;
        $this->dataHistory->coin_price = $coinPrice;
        $this->dataHistory->coins = $coins;
        $this->dataHistory->coins_value = $balanceAmount;
        $this->dataHistory->cfav = $cfav;
        $this->dataHistory->capital = $capital;
        $this->dataHistory->portfolio_control = $portafolioControl;
        $this->dataHistory->buy_sell_advice = $buySellAdvice;
        $this->dataHistory->market_order = $marketOrder;
        $this->dataHistory->coin_market_order = $coinMarketOrder;
        $this->dataHistory->commission = $commission;
        $this->dataHistory->coins_amount = $coinsAmount;
        $this->dataHistory->capital_amount = $capitalAmount;
        $this->dataHistory->total_amount = $totalAmount;
        $this->dataHistory->benefit = $benefit;

        $this->dataHistory->save();


        //        DB::table('trade_histories')->insert(array
//            ('user_id' => $userId,
//            'account_id' => $accountId,
//            'initial_capital' => $accountCapital,
//            'coin_price' => $coinPrice,
//            'coins' => $coins,
//            'coins_value' => $balanceAmount,
//            'cfav' => $cfav,
//            'capital' => $capital,
//            'portfolio_control' => $portafolioControl,
//            'buy_sell_advice' => $buySellAdvice,
//            'market_order' => $marketOrder,
//            'coin_market_order' => $coinMarketOrder,
//            'commission' => $commission,
//            'coins_amount' => $coinsAmount,
//            'capital_amount' => $capitalAmount,
//            'total_amount' => $totalAmount,
//            'benefit' => $benefit));
    }


}