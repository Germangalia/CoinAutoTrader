<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountsCoinBase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'wallet_address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'wallet_address',
    ];


    /**
     * Get the user that owns the account.Return a object
     */
    public function getUserRecord()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the history record associated with the user. Return a colection
     */
    public function getHistoryRecords()
    {
        return $this->hasMany('App\Tradehistory');
    }
}
