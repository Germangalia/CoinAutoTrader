<?php

use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAuthentication;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestCoinBaseAccounts extends TestCase
{

    /**
     * @var CoinBaseAuthentication
     */
    private $authentication;

    /**
     * @var CoinBaseAccounts
     */
    private $coinBaseAccounts;

    /**
     * @var
     */
    private $client;

    /**
     * @var
     */
    private $account;

    /**
     * TestCoinBaseAccounts constructor.
     */
    public function __construct(CoinBaseAccounts $coinBaseAccounts, CoinBaseAuthentication $authentication)
    {
        $this->authentication = $authentication;
        $this->coinBaseAccounts = $coinBaseAccounts;

        $this->client = $this->$authentication->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
    }


    /**
     * Test for create account.
     *
     * @return void
     */
    public function testCreateAccount()
    {
        $this->account = $this->coinBaseAccounts->createAccount($this->client, 'New test account');
        $this->assertTrue(is_object($this->account));
    }


    /**
     * Test get blance account.
     *
     * @return void
     */
    public function testBalanceAccount()
    {
        $balance = $this->coinBaseAccounts->balanceAccount($this->client, $this->account);
        $balanceValue = $balance->getAmount();
        $this->assertTrue(is_numeric($balanceValue));
    }

}
