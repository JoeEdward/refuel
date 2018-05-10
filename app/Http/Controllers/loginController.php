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
    	
        // Send OATH request to google sign in api through laravel socialite
                $user = Socialite::driver('google')->user();
        
                // OAuth Two Providers
                $token = $user->token;
                $refreshToken = $user->refreshToken; // not always provided
                $expiresIn = $user->expiresIn;
        
        $type = 'defualt';

        // Array for automatically setting up the users year group
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

        // Determines what year they are in by checking the date on there username.
        if(substr($user->getEmail(), 0, 2) > 0) {
            $type = "student";

            $year_group = $years[substr($user->getEmail(), 0, 2)];
        }
        else {
            $type = "staff";
        }

        // Makes the new user using the update or create method which looks for the values in the database first then if its not found makes a new record or updates the current one.

        $newUser = User::updateOrCreate([
            'email' => $user->getEmail(),
            'name' => $user->getName(),
            'type' => $type,
            'year_group' => $year_group,
            'allow' => true
        ]);


        // Defualt laravel function to log the user into the authentication framework.
        auth()->login($newUser);

        return redirect('dashboard');


    }


    public function destroy()
    {
        // Ends the users session on the site by logging them out // Does not actually delete the user.

        auth()->logout();

        return redirect('/');
    }


}
