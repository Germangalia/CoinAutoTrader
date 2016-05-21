<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Controllers\PartialsAutoTrader\EmailManager;
use App\Http\Requests;
use Illuminate\Http\Request;
use Mail;
use Vinkla\Alert\Facades\Alert;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class SendEmailController extends Controller
{

    /**
     * Send email from form data.
     *
     * @return view
     */
    public function sendEmail(Request $requests)
    {
        //Get data from form
        $name = $requests->name;
        $from = $requests->email;
        $human = $requests->human;

        if ($name != '' && $from != '') {
            if ($human == '4') {

                $message = array('name' => $requests->name, 'email' => $requests->email, 'message' => $requests->message);
                $this->send($message);

                Alert::success('Your message has been sent!');
            } else if ($human != '4') {
                Alert::danger('You answered the anti-spam question incorrectly!');
            }
        } else {
            Alert::danger('You need to fill in all required fields!!');
        }

        return view('layouts/landing');
    }

    public function send($message)
    {
        $this->dispatch(new EmailManager($message));
    }
}
