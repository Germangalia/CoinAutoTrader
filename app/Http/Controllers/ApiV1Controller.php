<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Transformers\ApiHistoryTransformer;
use App\Http\Controllers\Transformers\ApiValueTransformer;
use Auth;
use DB;
use App\Http\Requests;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use EllipseSynergie\ApiResponse\Contracts\Response;

/**
 * Versión 1 of the API. Return JSON.
 * Class ApiV1Controller
 * @package App\Http\Controllers
 */
class ApiV1Controller extends ApiGuardController
{

    /**
     * @var ApiHistoryTransformer
     */
    private $apiHistoryTransformer;


    /**
     * @var ApiValueTransformer
     */
    private $apiValueTransformer;


    /**
     * @var array
     */
    protected $apiMethods = [
//        'getSumInitialCapital' => ['keyAuthentication' => false],
//        'getHistory' => ['keyAuthentication' => false],
//        'getHistoryByID' => ['keyAuthentication' => false],
//        'getCapital' => ['keyAuthentication' => false],
//        'getBitcoins' => ['keyAuthentication' => false],
//        'getTotal' => ['keyAuthentication' => false],
//        'getAvgInitialCapital' => ['keyAuthentication' => false],
//        'getAvgCapital' => ['keyAuthentication' => false],
//        'getAvgBitcoins' => ['keyAuthentication' => false],
//        'getAvgBenefit' => ['keyAuthentication' => false],
//        'getAvgTotal' => ['keyAuthentication' => false],
//        'getSumInitialCapital' => ['keyAuthentication' => false],
//        'getBitcoinPrice' => ['keyAuthentication' => false],
    ];


    /**
     * @param Response
     */
    public function __construct(ApiHistoryTransformer $apiHistoryTransformer, ApiValueTransformer $apiValueTransformer)
    {
        parent::__construct();
        $this->apiHistoryTransformer = $apiHistoryTransformer;
        $this->apiValueTransformer = $apiValueTransformer;
    }



    //API Statistics

    /**
     * Get sum of initial capital for all accounts
     * @return string
     */
    public function getSumInitialCapital()
    {
        $result = getSumInitialCapital();
        return $this->response->withItem($result, $this->apiValueTransformer);
    }

    /**
     * Get history records for user
     * @return string
     */
    public function getHistory()
    {
        $result = getHistory();
        return $this->response->withCollection($result, $this->apiHistoryTransformer);
    }

    /**
     * Get history records for account
     * @return string
     */
    public function getHistoryByID($id)
    {
        $result = getHistoryByID($id);
        return $this->response->withCollection($result, $this->apiHistoryTransformer);
    }


    /**
     * Get capital for all accounts
     * @return string
     */
    public function getCapital()
    {
        $result = getCapital();
        return $this->response->withItem($result, $this->apiValueTransformer);
    }


    /**
     * Get bitcoins for all accounts
     * @return string
     */
    public function getBitcoins()
    {
        $result = getBitcoins();
        return $this->response->withItem($result, $this->apiValueTransformer);
    }


    /**
     * Get total amount for all accounts
     * @return string
     */
    public function getTotal()
    {
        $result = getTotal();
        return $this->response->withItem($result, $this->apiValueTransformer);
    }


    /**
     * Get avg of initial capital for all accounts
     * @return string
     */
    public function getAvgInitialCapital()
    {
        $result = getAvgInitialCapital();
        return $this->response->withItem($result, $this->apiValueTransformer);
    }


    /**
     * Get avg capital for all accounts
     * @return string
     */
    public function getAvgCapital()
    {
        $result = getAvgCapital();
        return $this->response->withItem($result, $this->apiValueTransformer);
    }


    /**
     * Get avg bitcoins for all accounts
     * @return string
     */
    public function getAvgBitcoins()
    {
        $result = getAvgBitcoins();
        return $this->response->withItem($result, $this->apiValueTransformer);
    }


    /**
     * Get avg benefit for all accounts
     * @return string
     */
    public function getAvgBenefit()
    {
        $result = getAvgBenefit();
        return $this->response->withItem($result, $this->apiValueTransformer);
    }


    /**
     * @return string
     */
    public function getAvgTotal()
    {
        $result = getAvgTotal();
        return $this->response->withItem($result, $this->apiValueTransformer);
    }


    /**
     * Get avg total amount for all accounts
     * @return string
     */
    public function getBitcoinPrice()
    {
        $result = getBitcoinPrice();
        return $this->response->withItem($result, $this->apiValueTransformer);
    }

}
