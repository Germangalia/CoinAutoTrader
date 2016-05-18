<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'coinbase_api_key', 'coinbase_api_secret',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'coinbase_api_key', 'coinbase_api_secret',
    ];


    /**
     * Get the account record associated with the user. Return a colection
     */
    public function getAccountRecords()
    {
        return $this->hasMany('App\AccountsCoinBase');
    }


    /**
     * Get the history record associated with the user. Return a colection
     */
    public function getHistoryRecords()
    {
        return $this->hasMany('App\Tradehistory');
    }


}
