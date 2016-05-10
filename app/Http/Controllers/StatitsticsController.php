<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class StatitsticsController extends Controller
{

    public function index()
    {
        return view('layouts/statistics');
    }


    /**
     * Get sum of of accounts for user
     *
     * @return mixed
     */
    public function getCountAccounts()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;
        //Get sum of initial capital for all accounts
        $total = DB::table('accounts_coin_bases')->where('user_id', $userId)->count();

        return $total;
    }


    /**
     * Get sum of initial capital for all accounts
     *
     * @return mixed
     */
    public function getSumInitialCapital()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;
        //Get sum of initial capital for all accounts
        $total = DB::table('accounts_coin_bases')->where('user_id', $userId)->sum('initial_capital');

        return $total;
    }
}
