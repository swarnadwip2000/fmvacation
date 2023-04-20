<?php
namespace App\Helpers;

use App\Models\Cart;
use App\Models\Order;
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

    // count hold order
    public static function countHoldOrder()
    {
        if(Auth::check() && Auth::user()->hasRole('USER')){
            $count = Order::where('user_id', Auth::user()->id)->where('order_status', false)->count();
            return $count;
        } else{
            $count = 0;
            return $count;
        }
    }

    // count order
    public static function countOrder()
    {
        if(Auth::check() && Auth::user()->hasRole('USER')){
            $count = Order::where('user_id', Auth::user()->id)->where('order_status', true)->count();
            return $count;
        } else{
            $count = 0;
            return $count;
        }
    }

    public static function getOrder($vocher_code)
    {
        $order = Order::where('voucher_code', $vocher_code)->first();
        return $order;
    }
}