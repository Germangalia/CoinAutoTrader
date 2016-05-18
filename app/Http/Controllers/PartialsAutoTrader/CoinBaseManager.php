<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 18/05/16
 * Time: 17:14
 */

namespace App\Http\Controllers\PartialsAutoTrader;


use App\CoinBaseAPI\CoinBaseAccounts;
use App\CoinBaseAPI\CoinBaseAddresses;
use App\CoinBaseAPI\CoinBaseAuthentication;
use Auth;

class CoinBaseManager
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
     * CoinBaseManager constructor.
     * @param CoinBaseAuthentication $authentication
     * @param CoinBaseAccounts $coinBaseAccounts
     * @param CoinBaseAddresses $coinBaseAddresses
     */
    public function __construct(CoinBaseAuthentication $authentication, CoinBaseAccounts $coinBaseAccounts, CoinBaseAddresses $coinBaseAddresses)
    {
        $this->authentication = $authentication;
        $this->coinBaseAccounts = $coinBaseAccounts;
        $this->coinBaseAddresses = $coinBaseAddresses;
    }


    /**
     * Create client CoinBase API for the authenticated user.
     * @return mixed
     */
    public function createClientFromUser()
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
    public function createClientFromKeys($apiKey, $apiSecret)
    {
        $client = $this->authentication->apiKeyAuthentication($apiKey, $apiSecret);

        return $client;
    }


    /**
     * Create account CoinBase API from client.
     * @param $client
     * @return $this
     */
    public function createAccount($client, $title)
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
    public function getAccountById($client, $accountId)
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
    public function createAddress($client, $account)
    {
        //Create address
        $address = $this->coinBaseAddresses->createAddress($client, $account);

        return $address;
    }
}