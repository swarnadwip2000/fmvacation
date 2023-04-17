<?php
namespace App\Helpers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Helper
{
    public static function countCartPackage()
    {
        if(Auth::check() && Auth::user()->hasRole('USER')){
            $count = Cart::where('user_id', Auth::user()->id)->count();
            return $count;
        } else if(Session::has('session_id')) {
            $count = Cart::where('session_id', Session::get('session_id'))->count();
            return $count;
        } else{
            $count = 0;
            return $count;
        }
    }
}