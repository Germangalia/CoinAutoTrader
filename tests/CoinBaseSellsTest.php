<?php

use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseSells;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CoinBaseSellsTest extends TestCase
{
    private $authentication;

    private $coinBaseAccounts;

    private $coinBaseSells;

    private $client;

    private $account;

    /**
     * TestCoinBaseSells constructor.
     */
    public function __construct()
    {
        $this->authentication = new CoinBaseAuthentication();
        $this->coinBaseAccounts = new CoinBaseAccounts();
        $this->coinBaseSells = new CoinBaseSells();

        $this->client = $this->authentication->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $this->account = $this->coinBaseAccounts->createAccount($this->client, 'New Test Account');
    }


    /**
     * Test for sell bitcoins.
     *
     * @group coinbase
     * @return void
     */
    public function testBuyBitcoins()
    {
        //TODO in production
//        $amount = 0.25;
//        $sell = $this->coinBaseSells->sellBitcoins($this->client, $this->account, $amount);
//        $this->assertTrue(is_bool($sell));
    }

}