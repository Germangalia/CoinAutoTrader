<?php
/**
 * Created by PhpStorm.
 * User: ggalia84
 * Date: 21/05/16
 * Time: 17:23.
 */
namespace App\Http\Controllers\PartialsAutoTrader;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class EmailManager implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $message;

    /**
     * EmailManager constructor.
     *
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Execute the email.
     *
     * @return void
     */
    public function handle()
    {
        Mail::raw('Text to e-mail', function ($message) {
            $message->from($this->message['email'], 'CoinAutoTrader');
            $message->to('germangalia@iesebre.com')->subject('Comment Form Message CoinAutoTrader');
        });
    }
}
