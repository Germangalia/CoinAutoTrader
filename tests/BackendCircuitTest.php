<?php

use App\AccountsCoinBase;
use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAddresses;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseBuys;
use App\CoinBaseAPI\CoinBaseMarketData;
use App\CoinBaseAPI\CoinBaseSells;
use App\Http\Controllers\AutoTraderController;
use App\Http\Controllers\PartialsAutoTrader\CodeRefactorManager;
use App\Http\Controllers\PartialsAutoTrader\CoinBaseManager;
use App\Http\Controllers\PartialsAutoTrader\DatabaseManager;
use App\Http\Controllers\PartialsAutoTrader\FirstHistoryRecord;
use App\Http\Controllers\PartialsAutoTrader\GetActiveAccounts;
use App\TradeCalculator;
use App\TradeHistory;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BackendCircuitTest extends TestCase
{

    /**
     * @var AutoTraderController
     */
    private $autoTraderController;


    /**
     * BackendCircuitTest constructor.
     * @param AutoTraderController $autoTraderController
     */
    public function __construct()
    {

        $coinBaseBuys = new CoinBaseBuys();
        $coinBaseSells = new CoinBaseSells();
        $dataHistory = new TradeHistory();
        $accountsCoinBase = new AccountsCoinBase();
        $tradeCalculator = new TradeCalculator;
        $authentication = new CoinBaseAuthentication();
        $coinBaseAccounts = new CoinBaseAccounts();
        $coinBaseAddresses = new CoinBaseAddresses();
        $coinBaseMarketData = new CoinBaseMarketData();
        $getActiveAccounts = new GetActiveAccounts();
        $databaseManager = new DatabaseManager($dataHistory, $accountsCoinBase, $tradeCalculator);
        $coinBaseManager = new CoinBaseManager($authentication, $coinBaseAccounts, $coinBaseAddresses, $coinBaseMarketData);
        $firstHistoryRecord = new FirstHistoryRecord($coinBaseMarketData, $databaseManager);
        $codeRefactorManager = new CodeRefactorManager($databaseManager, $coinBaseManager, $firstHistoryRecord, $coinBaseBuys, $coinBaseSells, $coinBaseMarketData, $coinBaseAccounts);

        $this->autoTraderController = new AutoTraderController($getActiveAccounts, $databaseManager, $coinBaseManager, $codeRefactorManager, $coinBaseMarketData, $coinBaseAccounts);
    }


    /**
     * Test user registration
     *
     * @return void
     */
    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('German Galia', 'name')
            ->type('user@mail.com', 'email')
//            ->check('terms') TODO
            ->type('passw0RD', 'password')
            ->type('passw0RD', 'password_confirmation')
            ->type('uh9w88tq10dBqylt', 'key')
            ->type('a8jJ2QL7p5GgDsf1LYtkR3xmTWa70o9b', 'secret')
            ->press('Register')
            ->seePageIs('/home')
            ->seeInDatabase('users', ['email' => 'ggalia84@gmail.com',
                'name'  => 'German Galia Beltran']);

    }

    /**
     * Create Account
     *
     * @group backend
     * @return void
     */
    public function testCreateNewAccountFromAccountsPage()
    {

        $this->testNewUserRegistration();

        $this->visit('/accounts')
            ->type('Bitcoin Account', 'title')
            ->type(10500, 'initialCapital')
            ->press('Create Account')
            ->see('Congratulations! Your new account is ready to activate.');
    }



    /**
     * Activate Account
     *
     * @group backend
     * @return void
     */
    public function testActivateAccountFromAccountsPage()
    {

        $this->testCreateNewAccountFromAccountsPage();

        $this->visit('/accounts')
            ->press('Activate/Disable')
            ->seeInDatabase('accounts_coin_bases', ['active' => true]);
    }


    /**
     * Dessable Account
     *
     * @group backend
     * @return void
     */
    public function testDesableAccountFromAccountsPage()
    {

        $this->testCreateNewAccountFromAccountsPage();

        $this->visit('/accounts')
            ->press('Activate/Disable')
            ->seeInDatabase('accounts_coin_bases', ['active' => false]);
    }


    /**
     * Remove Account
     *
     * @group backend
     * @return void
     */
    public function testRemoveAccountFromAccountsPage()
    {

        $this->testCreateNewAccountFromAccountsPage();

        $this->visit('/accounts')
            ->press('Remove');

        $this->assertTrue(true);
    }


    /**
     * Execute Trade
     *
     * @group backend
     * @return void
     */
    public function testExecuteAutomaticTradeFromBackend()
    {

        $this->testActivateAccountFromAccountsPage();

        $this->autoTraderController->execute();

        $this->seeInDatabase('trade_histories', ['initial_capital' => 10500]);
    }

}
