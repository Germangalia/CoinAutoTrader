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
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BackendCircuitTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var AutoTraderController
     */
    private $autoTraderController;

    /**
     * BackendCircuitTest constructor.
     *
     * @param AutoTraderController $autoTraderController
     */
    public function __construct()
    {
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

        $this->autoTraderController = new AutoTraderController($getActiveAccounts, $databaseManager, $coinBaseManager, $codeRefactorManager, $coinBaseMarketData, $coinBaseAccounts);
    }

    /**
     * Test user registration.
     *
     * @group backend
     *
     * @return void
     */
    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('German Galia', 'name')
            ->type('example@mail.com', 'email')
//            ->check('terms') TODO
            ->type('passw0RD', 'password')
            ->type('passw0RD', 'password_confirmation')
            ->type('uh9w88tq10dBqylt', 'key')
            ->type('a8jJ2QL7p5GgDsf1LYtkR3xmTWa70o9b', 'secret')
            ->press('Register')
            ->seePageIs('/home')
            ->seeInDatabase('users', ['email' => 'example@mail.com',
                'name'                        => 'German Galia', ]);
    }

    /**
     * Create Account.
     *
     * @group backend
     *
     * @return void
     */
    public function testCreateNewAccountFromAccountsPage()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/accounts')
            ->type('Bitcoin Account', 'title')
            ->type(10500, 'initialCapital')
            ->press('create-account')
            ->see('Congratulations! Your new account is ready to activate.');
    }

    /**
     * Activate Account.
     *
     * @group backend
     *
     * @return void
     */
    public function testActivateAccountFromAccountsPage()
    {
        $user = factory(App\User::class)->create();

        $this->testCreateNewAccountFromAccountsPage();

        $this->actingAs($user)
            ->visit('/accounts')
            ->visit('/api/accounts-active/1')
            ->seeInDatabase('accounts_coin_bases', ['active' => true]);
    }

    /**
     * Execute Trade.
     *
     * @group backend
     *
     * @return void
     */
    public function testExecuteAutomaticTradeFromBackend()
    {
        $user = factory(App\User::class)->create();

        $this->testActivateAccountFromAccountsPage();

        $this->autoTraderController->execute();

        $this->actingAs($user)
            ->seeInDatabase('trade_histories', ['initial_capital' => 10500]);
    }

    /**
     * Dessable Account.
     *
     * @group backend
     *
     * @return void
     */
    public function testDesableAccountFromAccountsPage()
    {
        $user = factory(App\User::class)->create();

        $this->testActivateAccountFromAccountsPage();

        $this->actingAs($user)
            ->visit('/accounts')
            ->visit('/api/accounts-active/1')
            ->seeInDatabase('accounts_coin_bases', ['active' => false]);
    }

    /**
     * Remove Account.
     *
     * @group backend
     *
     * @return void
     */
    public function testRemoveAccountFromAccountsPage()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('api/accounts-delete/1')
            ->assertTrue(true);
    }
}
