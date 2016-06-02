<?php

namespace App\Console;

use App\AccountsCoinBase;
use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAddresses;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseBuys;
use App\CoinBaseAPI\CoinBaseMarketData;
use App\CoinBaseAPI\CoinBaseSells;
use App\Events\ShouldBroadcastBitcoinPrice;
use App\Http\Controllers\AutoTraderController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PartialsAutoTrader\CodeRefactorManager;
use App\Http\Controllers\PartialsAutoTrader\CoinBaseManager;
use App\Http\Controllers\PartialsAutoTrader\DatabaseManager;
use App\Http\Controllers\PartialsAutoTrader\FirstHistoryRecord;
use App\Http\Controllers\PartialsAutoTrader\GetActiveAccounts;
use App\TradeCalculator;
use App\TradeHistory;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        /*
         * Execute the trader in backend
         */
        $schedule->call(function () {

            $coinBaseBuys = new CoinBaseBuys();
            $coinBaseSells = new CoinBaseSells();
            $dataHistory = new TradeHistory();
            $accountsCoinBase = new AccountsCoinBase();
            $tradeCalculator = new TradeCalculator();
            $authentication = new CoinBaseAuthentication();
            $coinBaseAccounts = new CoinBaseAccounts();
            $coinBaseAddresses = new CoinBaseAddresses();
            $coinBaseMarketData = new CoinBaseMarketData();
            $getActiveAccounts = new GetActiveAccounts();
            $databaseManager = new DatabaseManager($dataHistory, $accountsCoinBase, $tradeCalculator);
            $coinBaseManager = new CoinBaseManager($authentication, $coinBaseAccounts, $coinBaseAddresses, $coinBaseMarketData);
            $firstHistoryRecord = new FirstHistoryRecord($coinBaseMarketData, $databaseManager);
            $codeRefactorManager = new CodeRefactorManager($databaseManager, $coinBaseManager, $firstHistoryRecord, $coinBaseBuys, $coinBaseSells, $coinBaseMarketData, $coinBaseAccounts);

            $autoTraderController = new AutoTraderController($getActiveAccounts, $databaseManager, $coinBaseManager, $codeRefactorManager, $coinBaseMarketData, $coinBaseAccounts);

            $autoTraderController->execute();

        })->daily();


        /*
         * Event to reload the coin price.
         */
        $schedule->call(function () {

            $authentication = new CoinBaseAuthentication();
            $coinBaseAccounts = new CoinBaseAccounts();
            $coinBaseAddresses = new CoinBaseAddresses();
            $coinBaseMarketData = new CoinBaseMarketData();
            $coinBaseManager = new CoinBaseManager($authentication, $coinBaseAccounts, $coinBaseAddresses, $coinBaseMarketData);
            $shouldBroadcastBitcoinPrice = new ShouldBroadcastBitcoinPrice($coinBaseManager);

            $eventController = new EventController($shouldBroadcastBitcoinPrice);

            $eventController->fireBitcoinPrice();

        })->everyFiveMinutes();
    }
}
