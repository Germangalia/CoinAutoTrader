<?php


use App\Http\Controllers\PartialsAutoTrader\CoinBaseManager;

class CoinBaseManagerTest extends TestCase
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
     * @var CoinBaseAddresses
     */
    private $coinBaseAddresses;

    /**
     * @var
     */
    private $coinBaseManager;


    /**
     * TestCoinBaseAddress constructor.
     */
    public function __construct()
    {
        $this->coinBaseManager = new CoinBaseManager();
    }


    /**
     * Create client CoinBase API for the authenticated user.
     * @return mixed
     */
    public function testCreateClientFromUser()
    {
        //Select Authenticated user
        $user = Auth::user();

        $apiKey = $user->coinbase_api_key;
        $apiSecret = $user->coinbase_api_secret;

        //Create client
        $client = $this->authentication->apiKeyAuthentication($apiKey, $apiSecret);

        return $client;
    }


    /**
     * Create client CoinBase API with api key and api secret.
     * @param $apiKey
     * @param $apiSecret
     * @return \Coinbase\Wallet\Client
     */
    public function testCreateClientFromKeys($apiKey, $apiSecret)
    {
        $client = $this->authentication->apiKeyAuthentication($apiKey, $apiSecret);

        return $client;
    }


    /**
     * Create account CoinBase API from client.
     * @param $client
     * @return $this
     */
    public function testCreateAccount($client, $title)
    {
        //Create account
        $account = $this->coinBaseAccounts->createAccount($client, $title);

        return $account;
    }


    /**
     * Get the account by id
     * @param $client
     * @param $accountId
     * @return mixed
     */
    public function testGetAccountById($client, $accountId)
    {
        $account = $this->coinBaseAccounts->getAccountDetails($client, $accountId);

        return $account;
    }


    /**
     * Create address CoinBase API from client and account.
     * @param $client
     * @param $account
     * @return \Coinbase\Wallet\Resource\Address
     */
    public function testCreateAddress($client, $account)
    {
        //Create address
        $address = $this->coinBaseAddresses->createAddress($client, $account);

        return $address;
    }

}