<?php

use App\Http\Requests;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// The default throttle limits it to 60 attempts per minute, and disables their access for a single minute if they hit the limit.
Route::group(['prefix' => 'api/v1/', 'middleware' => 'throttle'], function () {
    //Landing page
    Route::post('send-email', 'SendEmailController@sendEmail');
    //Accounts
    Route::post('accounts', 'AccountsController@createAccount');

    //API Accounts
    Route::get('user-accounts', 'AccountsController@getUserAccounts');
    Route::get('accounts-active/{id}', 'AccountsController@activateAccounts');
    Route::get('accounts-delete/{id}', 'AccountsController@deleteAccounts');

    //API History
    Route::get('user-history', 'HistoryController@getUserHistory');

    //API Statistics
    Route::get('statistics/totalInitialCapital', 'StatitsticsController@getSumInitialCapital');
    Route::get('statistics/getUserHistory', 'StatitsticsController@getHistory');
    Route::get('statistics/getAccountHistory/{id}', 'StatitsticsController@getHistoryByID');
    Route::get('statistics/getSumInitialCapital', 'StatitsticsController@getSumInitialCapital');
    Route::get('statistics/getCapital', 'StatitsticsController@getCapital');
    Route::get('statistics/getBitcoins', 'StatitsticsController@getBitcoins');
    Route::get('statistics/getTotal', 'StatitsticsController@getTotal');
    Route::get('statistics/getAvgInitialCapital', 'StatitsticsController@getAvgInitialCapital');
    Route::get('statistics/getAvgCapital', 'StatitsticsController@getAvgCapital');
    Route::get('statistics/getAvgBitcoins', 'StatitsticsController@getAvgBitcoins');
    Route::get('statistics/getAvgBenefit', 'StatitsticsController@getAvgBenefit');
    Route::get('statistics/getAvgTotal', 'StatitsticsController@getAvgTotal');
    Route::get('statistics/getBitcoinPrice', 'StatitsticsController@getBitcoinPrice');
});
