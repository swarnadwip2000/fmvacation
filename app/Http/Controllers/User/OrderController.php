<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DeliverAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
       $package = Cart::where('user_id', Auth::user()->id)->first();
        $count = DeliverAddress::where('user_id', Auth::user()->id)->count();
        if ($count > 0) {
            $address = DeliverAddress::where('user_id', Auth::user()->id)->first();
        } else {
            $address = null;
        }
        return view('frontend.checkout')->with(compact('package','address'));
    }

    public function saveAddress(Request $request)
    {
        // save address to my account
         $data = $request->all();
        $count = DeliverAddress::where('user_id', Auth::user()->id)->count();
        if ($count > 0) {
          $address = DeliverAddress::where('user_id', Auth::user()->id)->first();
            $address->user_id = Auth::user()->id;
            $address->first_name = $data['first_name'];
            $address->last_name = $data['last_name'];
            $address->address = $data['address'];
            $address->state = $data['state'];
            $address->country = $data['country'];
            $address->zipcode = $data['zipcode'];
            $address->save();
        } else {
            $address = new DeliverAddress();
            $address->user_id = Auth::user()->id;
            $address->first_name = $data['first_name'];
            $address->last_name = $data['last_name'];
            $address->address = $data['address'];
            $address->state = $data['state'];
            $address->country = $data['country'];
            $address->zipcode = $data['zipcode'];
            $address->save();
        }
        return redirect()->back()->with('flash_message_success', 'Address has been saved');
    }
}
