<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {
        if (Auth::check()) {
            $packageCart = Cart::where('user_id', Auth::user()->id)->first();
        } else {
            $session_id = Session::get('session_id');
            $packageCart = Cart::where('session_id', $session_id)->first();
        }

        return view('frontend.cart')->with(compact('packageCart'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'send_to' => 'required',
            'send_message' => 'required|max:20',
            'delivery_method' => 'required',
            'send_from' => 'required',
        ],[
            'send_to.required' => 'Please enter send to',
            'send_message.required' => 'Please enter gift message field',
            'send_message.max' => 'Gift message field must be less than 20 characters',
            'delivery_method.required' => 'Please select delivery method',
            'send_from.required' => 'Please enter the recipient mailing address',
        ]);

        $data = $request->all();

        // generate session id if not exists
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = Session::getId();
            Session::put('session_id', $session_id);
        }

        // check package is already exists in cart
        if (Auth::check()) {
            $packageCountCart = Cart::where('user_id', Auth::user()->id)->count();
            $user = Auth::user()->id;
            // delete package
            if ($packageCountCart > 0) {
                Cart::where('user_id', Auth::user()->id)->delete();
            }
        } else {
            $packageCountCart = Cart::where('session_id', $session_id)->count();
            $user = Null;
            // delete package
            if ($packageCountCart > 0) {
                Cart::where('session_id', $session_id)->delete();
            }
        }

        // save package in cart
        $cart = new Cart();
        $cart->package_id = $data['package_id'];
        $cart->user_id = $user;
        $cart->session_id = $session_id;
        $cart->send_to = $data['send_to'];
        $cart->send_from = $data['send_from'];
        $cart->send_message = $data['send_message'];
        $cart->delivery_method = $data['delivery_method'];
        $cart->save();

        return redirect()->route('cart')->with('message', 'Package added to cart successfully.');
    }

    public function cartRemove(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            Cart::where('id', $data['id'])->delete();
            return response()->json(['status' => 'success', 'message' => 'Package removed from cart successfully.']);
        }
    }

    
}
