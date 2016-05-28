<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 26/05/16
 * Time: 20:20
 */

namespace App\Events;

use App\Events\Event;
use App\Http\Controllers\PartialsAutoTrader\CoinBaseManager;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShouldBroadcastBitcoinPrice extends Event implements ShouldBroadcast
{

    use SerializesModels;

    /**
     * @var array
     */
    public $data;

    /**
     * @var float
     */
    public $bitcoinPrice;

    /**
     * @var CoinBaseManager
     */
    private  $coinBaseManager;


    /**
     * Constructor
     */
    public function __construct(CoinBaseManager $coinBaseManager)
    {
        $this->coinBaseManager = $coinBaseManager;

        $this->bitcoinPrice = $this->coinBaseManager->getBitcoinPrice();

        $this->data = array(
            'bitcoinprice'=> $this->bitcoinPrice
        );
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['bitcoin-price-channel'];
    }
}