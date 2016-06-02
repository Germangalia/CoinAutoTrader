<?php

namespace App\Http\Controllers;

use Auth;
use DB;

/**
 * Class HistoryController.
 */
class HistoryController extends Controller
{
    /**
     * Return the history view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('layouts/history');
    }

    /**
     * Get the history records from user.
     *
     * @return array|static[]
     */
    public function getUserHistory()
    {
        //Select Authenticated user
        $user = Auth::user();
        $userId = $user->id;
        //Get accounts from database
        $userHistory = DB::table('trade_histories')->where('user_id', $userId)->get();

        return $userHistory;
    }
}
