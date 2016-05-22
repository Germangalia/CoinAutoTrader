<?php

use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAuthentication;
use App\CoinBaseAPI\CoinBaseMarketData;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestCoinBaseMarketData extends TestCase
{
    private $authentication;

    private $coinBaseAccounts;

    private $coinBaseMarketData;

    private $client;

    private $account;

    /**
     * TestCoinBaseMarketData constructor.
     */
    public function __construct( CoinBaseAuthentication $authentication, CoinBaseAccounts $coinBaseAccounts,CoinBaseMarketData $coinBaseMarketData)
    {
        $this->authentication = $authentication;
        $this->coinBaseAccounts = $coinBaseAccounts;
        $this->coinBaseMarketData = $coinBaseMarketData;

        $this->client = $this->$authentication->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $this->account = $this->coinBaseAccounts->createAccount($this->client, 'New Test Account');
    }

    /**
     * Test for get the buy price of bitcoins.
     *
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
     * @return void
     */
    public function testGetSellPrice()
    {
        $sellPrice = $this->coinBaseMarketData->getSellPrice($this->client);
        $this->assertTrue(is_numeric($sellPrice));
    }
}