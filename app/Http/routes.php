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

Route::get('/', function () {
    return view('welcome');
});

Route::get('accounts', 'AccountsController@index');


Route::group(['middleware' => 'auth'], function () {
    //Landing page
    Route::post('send-email', 'SendEmailController@sendEmail');
    //Accounts
//    Route::get('accounts', 'AccountsController@index');
    Route::post('accounts', 'AccountsController@createAccount');
    //History
    Route::get('history', 'HistoryController@index');
    //Statistics
    Route::get('statistics/index', 'StatitsticsController@index');
    Route::get('statistics/benefit-evolution', 'StatitsticsController@benefitEvolution');


    //Test
    Route::get('test/coinbase', 'TestCoinBase@testing');
    Route::get('test/trader', 'AutoTraderController@execute');
    Route::get('test/activate/{id}', 'AccountsController@activateAccounts');
    Route::get('test/chart', 'StatitsticsController@index');

    //API Accounts
    Route::get('api/user-accounts', 'AccountsController@getUserAccounts');
    Route::get('api/accounts-active/{id}', 'AccountsController@activateAccounts');
    Route::get('api/accounts-delete/{id}', 'AccountsController@deleteAccounts');

    //API History
    Route::get('api/user-history', 'HistoryController@getUserHistory');

    //API Statistics
    Route::get('api/statistics/totalInitialCapital', 'StatitsticsController@getSumInitialCapital');
    Route::get('api/statistics/getUserHistory', 'StatitsticsController@getHistory');
    Route::get('api/statistics/getAccountHistory/{id}', 'StatitsticsController@getHistoryByID');

    Route::get('api/statistics/getSumInitialCapital', 'StatitsticsController@getSumInitialCapital');
    Route::get('api/statistics/getCapital', 'StatitsticsController@getCapital');
    Route::get('api/statistics/getBitcoins', 'StatitsticsController@getBitcoins');
    Route::get('api/statistics/getTotal', 'StatitsticsController@getTotal');
    Route::get('api/statistics/getAvgInitialCapital', 'StatitsticsController@getAvgInitialCapital');
    Route::get('api/statistics/getAvgCapital', 'StatitsticsController@getAvgCapital');
    Route::get('api/statistics/getAvgBitcoins', 'StatitsticsController@getAvgBitcoins');
    Route::get('api/statistics/getAvgBenefit', 'StatitsticsController@getAvgBenefit');
    Route::get('api/statistics/getAvgTotal', 'StatitsticsController@getAvgTotal');
    Route::get('api/statistics/getBitcoinPrice', 'StatitsticsController@getBitcoinPrice');

});


