<?php


use Illuminate\Foundation\Testing\WithoutMiddleware;

class RoutesTest extends TestCase
{
    //use WithoutMiddleware;

    /**
     * Test the routes.php AccountsController@getUserAccounts
     * @group routes
     */
    public function testRoutesAccountsControllerGetUserAccounts()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('/api/user-accounts');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php AccountsController@activateAccounts
     * @group routes
     */
    public function testRoutesAccountsControllerActiveAccounts()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/accounts-active/1');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php AccountsController@deleteAccounts
     * @group routes
     */
    public function testRoutesAccountsControllerDeleteAccounts()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/accounts-delete/1');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php HistoryController@getUserHistory
     * @group routes
     */
    public function testRoutesHistoryControllerGetUserHistory()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/user-history');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getSumInitialCapital
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetSumInitialCapital()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/totalInitialCapital');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getUserAccounts
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetUserAccounts()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getUserAccounts');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getHistoryByID
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetHistoryByID()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getAccountHistory/1');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getCapital
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetCapital()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getCapital');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getBitcoins
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetBitcoins()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getBitcoins');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getTotal
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetTotal()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getTotal');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getAvgInitialCapital
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetAvgInitialCapital()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getAvgInitialCapital');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getAvgCapital
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetAvgCapital()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getAvgCapital');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getAvgBitcoins
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetAvgBitcoins()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getAvgBitcoins');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getAvgBenefit
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetAvgBenefit()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getAvgBenefit');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getAvgTotal
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetAvgTotal()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getAvgTotal');
        $this->assertTrue(is_object($result));
    }


    /**
     * Test the routes.php StatitsticsController@getBitcoinPrice
     * @group routes
     */
    public function testRoutesStatitsticsControllerGetBitcoinPrice()
    {
        //Not use with WithoutMiddleware
        $result = $this->visit('api/statistics/getBitcoinPrice');
        $this->assertTrue(is_object($result));
    }

}