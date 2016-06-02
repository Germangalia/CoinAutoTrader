<?php

use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAuthentication;

class CoinBaseAccountsTest extends TestCase
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
    public function __construct()
    {
        $this->authentication = new CoinBaseAuthentication();
        $this->coinBaseAccounts = new CoinBaseAccounts();

        $this->client = $this->authentication->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
    }

    /**
     * Test for create account.
     *
     * @group coinbase
     *
     * @return void
     */
    public function testCreateAccount()
    {
        $this->account = $this->coinBaseAccounts->createAccount($this->client, 'New test account');
        $object = $this->account;
        $this->assertTrue(is_object($object));
    }

    /**
     * Test get blance account.
     *
     * @group coinbase
     *
     * @return void
     */
    public function testGetBalanceAccount()
    {
        $balance = $this->coinBaseAccounts->balanceAccount($this->client, $this->account);
        $balanceValue = $balance;
        $this->assertTrue(is_numeric($balanceValue));
    }
}
