<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 18/05/16
 * Time: 16:50
 */

namespace App\Http\Controllers\PartialsAutoTrader;


use App\AccountsCoinBase;
use App\TradeHistory;
use Auth;
use DB;

class DatabaseManager
{

    /**
     * @var TradeHistory
     */
    private $dataHistory;


    /**
     * @var AccountsCoinBase
     */
    private $accountsCoinBase;


    /**
     * DatabaseManager constructor.
     * @param TradeHistory $dataHistory
     * @param AccountsCoinBase $accountsCoinBase
     */
    public function __construct(TradeHistory $dataHistory, AccountsCoinBase $accountsCoinBase)
    {
        $this->dataHistory = $dataHistory;
        $this->accountsCoinBase = $accountsCoinBase;
    }


    /**
     * Insert new record in Acounts database table
     * @param $title
     * @param $id
     * @param $accountId
     * @param $address
     * @param $balance
     * @param $initialCapital
     * @param $active
     */
    public function insertAccounts($name, $user_id, $account_id, $wallet_address, $balance, $initial_capital, $active)
    {
        $this->accountsCoinBase->name = $name;
        $this->accountsCoinBase->user_id = $user_id;
        $this->accountsCoinBase->account_id = $account_id;
        $this->accountsCoinBase->wallet_address = $wallet_address;
        $this->accountsCoinBase->balance = $balance;
        $this->accountsCoinBase->initial_capital = $initial_capital;
        $this->accountsCoinBase->active = $active;

        $this->accountsCoinBase->save();
    }


    /**
     * Update the balance in accounts database table.
     * @param $accountId
     * @param $totalAmount
     */
    public function updateBalance($accountId, $totalAmount)
    {
        DB::table('accounts_coin_bases')->where('id', $accountId)->update(array('balance' => $totalAmount));
    }


    /**
     * Update the active in accounts database table.
     * @param $accountId
     * @param $active
     */
    public function updateActive($accountId, $active)
    {
        DB::table('accounts_coin_bases')->where('id', $accountId)->update(array('active' => $active));
    }


    /**
     * Get user accounts
     * @return array|static[]
     */
    public function getUserAccounts()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;
        //Get accounts from database
        $userAccounts = DB::table('accounts_coin_bases')->where('user_id', $userId)->get();

        return $userAccounts;
    }


    /**
     * Insert data to database History table
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