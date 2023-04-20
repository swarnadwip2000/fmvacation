<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ThankYouMail;
use App\Models\BookingEnquery;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function bookHotel(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'booking_from' => 'required',
            'booking_to' => 'required',
            'adults_number' => 'required',
            'location' => 'required',
        ]);
        if ($request->status == 'yes') {
            $count = Order::where(['voucher_code' => $request->voucher_code, 'order_status' => true])->count();
            if ($count > 0) {
                $countEnquiry = BookingEnquery::where(['voucher_code' => $request->voucher_code, 'status' => 'Accept'])->count();
                if ($countEnquiry > 0) {
                    return redirect()->back()->with('error', 'Voucher code is already used.');
                } else {
                    $booking = new BookingEnquery();
                    $booking->name = $request->name;
                    $booking->email = $request->email;
                    $booking->phone = $request->phone;
                    $booking->booking_from = $request->booking_from;
                    $booking->booking_to = $request->booking_to;
                    $booking->adults = $request->adults_number;
                    $booking->location = $request->location;
                    $booking->voucher_code = $request->voucher_code;
                    $booking->save();
                    Mail::to($booking->email)->send(new ThankYouMail($booking));
                    return redirect()->back()->with('message', 'Thank you for booking with us. We will contact you soon.');
                }
            } else {
                return redirect()->back()->with('error', 'Voucher code is not valid.');
            }
        } else {
            $booking = new BookingEnquery();
            $booking->name = $request->name;
            $booking->email = $request->email;
            $booking->phone = $request->phone;
            $booking->booking_from = $request->booking_from;
            $booking->booking_to = $request->booking_to;
            $booking->adults = $request->adults_number;
            $booking->location = $request->location;
            $booking->save();
            Mail::to($booking->email)->send(new ThankYouMail($booking));
            return redirect()->back()->with('message', 'Thank you for booking with us. We will contact you soon.');
        }
    }
}
