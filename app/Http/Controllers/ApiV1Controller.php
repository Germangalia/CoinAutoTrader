<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SendEmailController;

/**
 * Versión 1 of the API. Return JSON.
 * Class ApiV1Controller
 * @package App\Http\Controllers
 */
class ApiV1Controller extends Controller
{
    //Landing page


    /**
     * Send email from form data.
     * @return string
     */
    public function sendEmail()
    {
        $result = \App\Http\Controllers\SendEmailController::class->sendEmail();
        return json_encode($result);
    }

    //Accounts

    /**
     * Create new account
     * @return string
     */
    public function createAccount()
    {
        $result = \App\Http\Controllers\AccountsController::class->createAccount();
        return json_encode($result);
    }

    //API Accounts


    /**
     * Get all user accounts
     * @return string
     */
    public function getUserAccounts()
    {
        $result = \App\Http\Controllers\AccountsController::class->getUserAccounts();
        return json_encode($result);
    }


    /**
     * Get the active accounts of the user
     * Get the active accounts of the user
     * @return string
     */
    public function activateAccounts()
    {
        $result = \App\Http\Controllers\AccountsController::class->activateAccounts();
        return json_encode($result);
    }


    /**
     * Delete account by id
     * @return string
     */
    public function deleteAccounts()
    {
        $result = \App\Http\Controllers\AccountsController::class->deleteAccounts();
        return json_encode($result);
    }


    //API History

    /**
     * Get the history records from user
     * @return string
     */
    public function getUserHistory()
    {
        $result = \App\Http\Controllers\HistoryController::class->getUserHistory();
        return json_encode($result);
    }



    //API Statistics

    /**
     * Get sum of initial capital for all accounts
     * @return string
     */
    public function getSumInitialCapital()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getSumInitialCapital();
        return json_encode($result);
    }

    /**
     * Get history records for user
     * @return string
     */
    public function getHistory()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getHistory();
        return json_encode($result);
    }

    /**
     * Get history records for account
     * @return string
     */
    public function getHistoryByID()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getHistoryByID();
        return json_encode($result);
    }


    /**
     * Get capital for all accounts
     * @return string
     */
    public function getCapital()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getCapital();
        return json_encode($result);
    }


    /**
     * Get bitcoins for all accounts
     * @return string
     */
    public function getBitcoins()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getBitcoins();
        return json_encode($result);
    }


    /**
     * Get total amount for all accounts
     * @return string
     */
    public function getTotal()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getTotal();
        return json_encode($result);
    }


    /**
     * Get avg of initial capital for all accounts
     * @return string
     */
    public function getAvgInitialCapital()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getAvgInitialCapital();
        return json_encode($result);
    }


    /**
     * Get avg capital for all accounts
     * @return string
     */
    public function getAvgCapital()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getAvgCapital();
        return json_encode($result);
    }


    /**
     * Get avg bitcoins for all accounts
     * @return string
     */
    public function getAvgBitcoins()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getAvgBitcoins();
        return json_encode($result);
    }


    /**
     * Get avg benefit for all accounts
     * @return string
     */
    public function getAvgBenefit()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getAvgBenefit();
        return json_encode($result);
    }


    /**
     * @return string
     */
    public function getAvgTotal()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getAvgTotal();
        return json_encode($result);
    }


    /**
     * Get avg total amount for all accounts
     * @return string
     */
    public function getBitcoinPrice()
    {
        $result = \App\Http\Controllers\StatitsticsController::class->getBitcoinPrice();
        return json_encode($result);
    }

}
