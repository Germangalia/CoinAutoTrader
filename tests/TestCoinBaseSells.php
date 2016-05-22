<?php

use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseSells;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestCoinBaseSells extends TestCase
{
    private $authentication;

    private $coinBaseAccounts;

    private $coinBaseSells;

    private $client;

    private $account;

    /**
     * TestCoinBaseSells constructor.
     */
    public function __construct( CoinBaseAuthentication $authentication, CoinBaseAccounts $coinBaseAccounts,CoinBaseSells $coinBaseSells)
    {
        $this->authentication = $authentication;
        $this->coinBaseAccounts = $coinBaseAccounts;
        $this->coinBaseSells = $coinBaseSells;

        $this->client = $this->$authentication->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $this->account = $this->coinBaseAccounts->createAccount($this->client, 'New Test Account');
    }


    /**
     * Test for sell bitcoins.
     *
     * @return void
     */
    public function testBuyBitcoins()
    {
        $amount = 1.75;
        $sell = $this->coinBaseSells->sellBitcoins($this->client, $this->account, $amount);
        $this->assertTrue(is_bool($sell));
    }

}