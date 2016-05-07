<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 6/05/16
 * Time: 15:40
 */

namespace App\Http\Controllers\PartialsAutoTrader;


use App\CoinBaseAPI\CoinBaseMarketData;
use App\TradeHistory;

class FirstHistoryRecord
{

    public function makeFirstRecord($user, $accountId, $client, $account, $accountCapital, $balanceAmount)
    {
        //account_id = $accountId
        //initial_capital = $accountCapital
        //coins = $balanceAmount

        //Get user_id
        $userId = $user->id;

        //Get coins
        $marketData = new CoinBaseMarketData();
        $coinPrice = $marketData->getBuyPrice($client);

        //Get coins_value
        $coinsValue = $balanceAmount * $coinPrice;

        //Get CFAV
        $cfav = $coinsValue * Config::get('constants.CFAV_PERCENT');

        //Get Capital
        $capital = $accountCapital - $coinsValue;

        //Get prortfolio_control
        $portafolioControl = $coinsValue;
        //Get buy_sell_advice
        $buySellAdvice = 0;
        //Get market_order
        $marketOrder = 0;
        //Get coin_market_order
        $coinMarketOrder = 0;
        //Get commission
        $commission = 0;

         //Get coins amount
        $coinsAmount = $coinsValue;

        //Get capital_amount
        $capitalAmount = $accountCapital - $coinsValue;

        //Get total_amount
        $totalAmount = $coinsAmount + $capitalAmount;

        //Get benefit
        $benefit = $totalAmount / $accountCapital * 100;


        //Create DB record in trade_histories
        $dataHistory = new TradeHistory();

        $dataHistory->user_id = $userId;
        $dataHistory->account_id = $accountId;
        $dataHistory->initial_capital = $accountCapital;
        $dataHistory->coin_price = $coinPrice;
        $dataHistory->coins = $balanceAmount;
        $dataHistory->coins_value = $coinsValue;
        $dataHistory->cfav = $cfav;
        $dataHistory->capital = $capital;
        $dataHistory->portfolio_control = $portafolioControl;
        $dataHistory->buy_sell_advice = $buySellAdvice;
        $dataHistory->market_order = $marketOrder;
        $dataHistory->coin_market_order = $coinMarketOrder;
        $dataHistory->commission = $commission;
        $dataHistory->coins_amount = $coinsAmount;
        $dataHistory->capital_amount = $capitalAmount;
        $dataHistory->total_amount = $totalAmount;
        $dataHistory->benefit = $benefit;

        $dataHistory->save();

        //Update DB Accounts record
        DB::table('accounts_coin_bases')->where('id', $accountId)->update(array('balance' => $totalAmount));
    }

}