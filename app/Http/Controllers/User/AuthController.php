<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'first_name'     => 'required',
            'last_name'     => 'required',
            'email'    => 'required|email|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ], [
            'email.email' => 'The email format is invalid.',
            'confirm.required' => 'Please fill the filed.'
        ]);

        $input = $request->all();
        $user = new User();
        $user->first_name = $input['first_name'] ;
        $user->last_name = $input['last_name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->status = 1;
        $user->save();
        $user->assignRole('USER');


        $email = $request->email;
        return redirect()->route('login')->with('message', 'Your account was created successfully.');
    }

    public function loginCheck(Request $request)
    {
        // return $request->all();
        $request->validate([
            'email'    => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where('email', $request->email)->select('id', 'first_name','last_name', 'email', 'status')->first();

            if ($user->hasRole('USER') && $user->status == 1) {
                  // update cart table with user id
                  Cart::where('user_id', $user->id)->delete();
                  Cart::where('session_id', Session::get('session_id'))->update(['user_id' => $user->id]);
                return redirect()->route('home');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'Email id & password was invalid!');
            }
        } else {
            return redirect()->back()->with('error', 'Email id & password was invalid!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('message', 'You are logged out successfully.');
    }
}
