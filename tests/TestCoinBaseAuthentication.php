<?php

use App\CoinBaseAPI\CoinBaseAuthentication;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestCoinBaseAuthentication extends TestCase
{

    /**
     * @var CoinBaseAuthentication
     */
    private $coinBaseAuthentication;


    /**
     * TestCoinBaseAuthentication constructor.
     */
    public function __construct(CoinBaseAuthentication $coinBaseAuthentication)
    {
        $this->coinBaseAuthentication = $coinBaseAuthentication;
    }


    /**
     * Test to check if the $client is ok
     *
     * @return void
     */
    public function testAuthenticationCreateClient()
    {
        $client = $this->coinBaseAuthentication->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));

        $this->assertTrue(is_object($client));
    }
}
