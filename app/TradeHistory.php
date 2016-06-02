<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'account_id', 'initial_capital', 'coin_price', 'coins', 'coins_value', 'cfav', 'capital', 'portfolio_control', 'buy_sell_advice', 'market_order', 'coin_market_order', 'commission', 'coins_amount', 'capital_amount', 'total_amount', 'benefit',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Get the user that owns the history record.Return a object.
     */
    public function getUserRecord()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the account that owns the history record.Return a object.
     */
    public function getAccountRecord()
    {
        return $this->belongsTo('App\AccountsCoinBase');
    }
}
