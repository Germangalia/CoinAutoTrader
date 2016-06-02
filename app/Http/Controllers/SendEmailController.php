<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Controllers\PartialsAutoTrader\EmailManager;
use Illuminate\Http\Request;
use Vinkla\Alert\Facades\Alert;

/**
 * Class HomeController.
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
                $message = ['name' => $requests->name, 'email' => $requests->email, 'message' => $requests->message];
                $this->send($message);

                Alert::success('Your message has been sent!');
            } elseif ($human != '4') {
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
