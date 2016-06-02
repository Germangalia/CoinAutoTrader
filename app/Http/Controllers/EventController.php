<?php

namespace App\Http\Controllers;

use App\Events\ShouldBroadcastBitcoinPrice;

class EventController extends Controller
{
    /**
     * @var ShouldBroadcastBitcoinPrice
     */
    private $shouldBroadcastBitcoinPrice;

    /**
     * EventController constructor.
     */
    public function __construct(ShouldBroadcastBitcoinPrice $shouldBroadcastBitcoinPrice)
    {
        $this->shouldBroadcastBitcoinPrice = $shouldBroadcastBitcoinPrice;
    }

    /**
     * Fire bitcoin price.
     */
    public function fireBitcoinPrice()
    {
        event($this->shouldBroadcastBitcoinPrice);

        //return redirect()->back();
    }
}
