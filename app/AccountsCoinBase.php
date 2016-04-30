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
}
