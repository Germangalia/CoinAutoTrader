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




Route::group(['middleware' => 'auth'], function () {
    //Accounts
    Route::get('accounts', 'AccountsController@index');
    Route::post('accounts', 'AccountsController@createAccount');
    //History
    Route::get('history', 'HistoryController@index');
    //Statistics
    Route::get('statistics/index', 'StatitsticsController@index');
    Route::get('statistics/benefit-evolution', 'StatitsticsController@benefitEvolution');


    //Test
    Route::get('test/coinbase', 'TestCoinBase@testing');
    Route::get('test/trader', 'AutoTraderController@execute');
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


});


