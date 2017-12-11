<?php

namespace App\Http\Controllers;

use Socialite;

class loginController extends Controller
{
    public function new()
    {
    	return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
    	

    	$user = Socialite::driver('google')->user();

    	// OAuth Two Providers
		$token = $user->token;
		$refreshToken = $user->refreshToken; // not always provided
		$expiresIn = $user->expiresIn;

		return view('users.dashboard', ['name'=>$user->getName()]);
    }


}
