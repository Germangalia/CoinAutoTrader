<?php

use App\CoinBaseAPI\CoinBaseAuthentication;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestCoinBaseAuthentication extends TestCase
{
    /**
     * Test to check if the $client is ok
     *
     * @return void
     */
    public function testAuthenticationCreateClient()
    {
        $auth = new CoinBaseAuthentication();
        $client = $auth->apiKeyAuthentication(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));


    }
}
