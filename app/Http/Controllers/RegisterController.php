<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class RegisterController extends Controller
{

    public function createUser()
    {
        $user = new User;

        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->coinbase_api_key = Input::get('key');
        $user->coinbase_api_secret = Input::get('secret');
        $user->save();

        return view('home');
    }
}
