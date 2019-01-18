<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;


class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }
    public function callback($provider)
    {
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        dd($userSocial);
        /*$userSocial = Socialite::driver($provider)->stateless()->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        if($user){
            Auth::login($user);
            return redirect('/');
        }
        else{
            $id = $userSocial->getId();
            $user = User::create([
                'name' => $userSocial->getName(), 
                'email' => $userSocial->getEmail(), 
                'avatar' => $userSocial->getAvatar(), 
                'password' => bcrypt($id),
            ]);
            return redirect()->route('home');
        }*/

    }
}
