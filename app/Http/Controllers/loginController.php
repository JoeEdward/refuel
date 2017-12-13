<?php

namespace App\Http\Controllers;

use App\User;

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

        $type = 'defualt';

        $years = array(
            11 => 13 ,
            12 => 12,
            13 => 11,
            14 => 10,
            15 => 9,
            16 => 8,
            17 => 7
        );

        $year_group = null;

        if(substr($user->getEmail(), 0, 2) > 0) {
            $type = "student";

            $year_group = $years[substr($user->getEmail(), 0, 2)];
        }
        else {
            $type = "staff";
        }



        

        $newUser = User::updateOrCreate([
            'email' => $user->getEmail(),
            'name' => $user->getName(),
            'type' => $type,
            'year_group' => $year_group
        ]);

        auth()->login($newUser);

        return redirect('dashboard');


    }


    public function destroy()
    {
        auth()->logout();

        return redirect('home');
    }


}
