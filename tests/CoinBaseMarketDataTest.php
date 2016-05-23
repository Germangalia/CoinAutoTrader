<?php

use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseMarketData;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CoinBaseMarketDataTest extends TestCase
{
    private $authentication;

    private $coinBaseAccounts;

    private $coinBaseMarketData;

    private $client;

    private $account;

    /**
     * TestCoinBaseMarketData constructor.
     */
    public function __construct()
    {
        $this->authentication = new CoinBaseAuthentication();
        $this->coinBaseAccounts = new CoinBaseAccounts();
        $this->coinBaseMarketData = new CoinBaseMarketData();

        $this->client = $this->authentication->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $this->account = $this->coinBaseAccounts->createAccount($this->client, 'New Test Account');
    }

    /**
     * Test for get the buy price of bitcoins.
     *
     * @group coinbase
     * @return void
     */
    public function testGetBuyPrice()
    {
        $buyPrice = $this->coinBaseMarketData->getBuyPrice($this->client);
        $this->assertTrue(is_numeric($buyPrice));
    }

    /**
     * Test for get the sell price of bitcoins.
     *
     * @group coinbase
     * @return void
     */
    public function testGetSellPrice()
    {
        $sellPrice = $this->coinBaseMarketData->getSellPrice($this->client);
        $this->assertTrue(is_numeric($sellPrice));
    }
}