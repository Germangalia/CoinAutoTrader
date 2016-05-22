<?php

use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAddresses;
use App\CoinBaseAPI\CoinBaseAuthentication;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestCoinBaseAddresses extends TestCase
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
     * @var CoinBaseAccounts
     */
    private $coinBaseAddresses;

    /**
     * @var
     */
    private $client;

    /**
     * @var \Coinbase\Wallet\Resource\Account
     */
    private $account;

    /**
     * TestCoinBaseAddress constructor.
     */
    public function __construct( CoinBaseAuthentication $authentication, CoinBaseAccounts $coinBaseAccounts,CoinBaseAddresses $coinBaseAddresses)
    {
        $this->authentication = $authentication;
        $this->coinBaseAccounts = $coinBaseAccounts;
        $this->coinBaseAddresses = $coinBaseAccounts;

        $this->client = $this->$authentication->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $this->account = $this->coinBaseAccounts->createAccount($this->client, 'New Test Account');
    }


    /**
     * Test for create address.
     *
     * @return void
     */
    public function testCreateAddress()
    {
        $address = $this->coinBaseAddresses->createAddress($this->client, $this->account);
        $this->assertTrue(is_object($address));
    }


    /**
     * Test get address for account.
     *
     * @return void
     */
    public function testGetAddressForAccount()
    {
        $address = $this->coinBaseAddresses->getAddressForAccount($this->client, $this->account);
        $this->assertTrue(is_object($address));
    }

}
