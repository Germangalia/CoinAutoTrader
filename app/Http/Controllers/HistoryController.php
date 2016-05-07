<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class HistoryController extends Controller
{

    public function index()
    {
        return view('layouts/history');
    }


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
