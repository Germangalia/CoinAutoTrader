<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AutoTraderController extends Controller
{

    public function execute()
    {

        //Get all active accounts from database.

        $accountsClass = new \GetActiveAccounts();
        $activeAccounts = $accountsClass->getAccounts();


        //Get user from account.

        foreach($activeAccounts as $activeAccount)
        {

        }


        //Get last history record from account.


        //Create object AutoTrader



        //Keep object to Calculator table


        //Buy or sell coins



        //Keep to history table


        //Erase Record from Calculator table
    }
}
