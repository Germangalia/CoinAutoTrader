<?php

use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseBuys;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CoinBaseBuysTest extends TestCase
{
    private $authentication;

    private $coinBaseAccounts;

    private $coinBaseBuys;

    private $client;

    private $account;

    /**
     * TestCoinBaseBuys constructor.
     */
    public function __construct()
    {
        $this->authentication = new CoinBaseAuthentication();
        $this->coinBaseAccounts = new CoinBaseAccounts();
        $this->coinBaseBuys = new CoinBaseBuys();

        $this->client = $this->authentication->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $this->account = $this->coinBaseAccounts->createAccount($this->client, 'New Test Account');
    }


    /**
     * Test for buy bitcoins.
     *
     * @group coinbase
     * @return void
     */
    public function testBuyBitcoins()
    {
        //TODO in production
//        $amount = 0.25;
//        $buy = $this->coinBaseBuys->buyBitcoins($this->client, $this->account, $amount);
//        $this->assertTrue(is_bool($buy));
    }

}