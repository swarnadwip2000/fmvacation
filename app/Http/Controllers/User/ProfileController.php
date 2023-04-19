<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\SendVoucherCode;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;
class ProfileController extends Controller
{
    public function holdOrder()
    {
       $orders = Order::where('user_id', Auth::user()->id)->where('order_status', false)->get();
        return view('frontend.hold-orders')->with(compact('orders'));
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('order_status', true)->get();
        return view('frontend.orders')->with(compact('orders'));
    }

    public function profile()
    {
        return view('frontend.profile');
    }

    
    
    public function downloadPdf($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('frontend.pdf.voucher', [
            'order' => $order,
        ])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('voucher.pdf');

    }

    public function resendMil($id)
    {
        $order = Order::find($id);
        Mail::to($order->send_to)->send(new SendVoucherCode($order));
        return redirect()->back()->with('message', 'Mail has been sent');
    }

    public function profileUpdate(Request $request)
    {
        $count = User::where('email', $request->email)->where('id', '!=', Auth::user()->id)->count();
        if ($count > 0) {
            return redirect()->back()->with('error', 'Email Already Exists');
        } else {
            $profile = Auth::user();
            $profile->first_name = $request->first_name;
            $profile->last_name = $request->last_name;
            $profile->email = $request->email;
            $profile->phone = $request->phone;
            $profile->save();
            return redirect()->back()->with('message', 'Profile Updated Successfully');
        }
    }

    public function changePassword()
    {
        return view('frontend.change-password');
    }

    public function changePasswordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8|password',
            'new_password' => 'required|min:8|different:old_password',
            'confirm_password' => 'required|min:8|same:new_password', 
        ],[
            'old_password.password' => 'Old Password is incorrect',
            'new_password.different' => 'New Password must be different from old password',
            'confirm_password.same' => 'Confirm Password must be same as new password',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect()->back()->with('message', 'Password Updated Successfully');
    }
}
