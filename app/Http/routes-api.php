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

    //API Statistics
    Route::get('statistics/totalInitialCapital', 'ApiV1Controller@getSumInitialCapital');
    Route::get('statistics/getUserHistory', 'ApiV1Controller@getHistory');
    Route::get('statistics/getAccountHistory/{id}', 'ApiV1Controller@getHistoryByID');
    Route::get('statistics/getSumInitialCapital', 'ApiV1Controller@getSumInitialCapital');
    Route::get('statistics/getCapital', 'ApiV1Controller@getCapital');
    Route::get('statistics/getBitcoins', 'ApiV1Controller@getBitcoins');
    Route::get('statistics/getTotal', 'ApiV1Controller@getTotal');
    Route::get('statistics/getAvgInitialCapital', 'ApiV1Controller@getAvgInitialCapital');
    Route::get('statistics/getAvgCapital', 'ApiV1Controller@getAvgCapital');
    Route::get('statistics/getAvgBitcoins', 'ApiV1Controller@getAvgBitcoins');
    Route::get('statistics/getAvgBenefit', 'ApiV1Controller@getAvgBenefit');
    Route::get('statistics/getAvgTotal', 'ApiV1Controller@getAvgTotal');
    Route::get('statistics/getBitcoinPrice', 'ApiV1Controller@getBitcoinPrice');
});
