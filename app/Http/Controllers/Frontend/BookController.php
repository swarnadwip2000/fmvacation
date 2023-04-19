<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ThankYouMail;
use App\Models\BookingEnquery;
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
            'booking_date' => 'required',
            'booking_from' => 'required',
            'booking_to' => 'required',
            'adults_number' => 'required',
            'location' => 'required',
        ]);

        $booking = new BookingEnquery();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->booking_date = $request->booking_date;
        $booking->booking_from = $request->booking_from;
        $booking->booking_to = $request->booking_to;
        $booking->adults = $request->adults_number;
        $booking->location = $request->location;
        $booking->save();
        Mail::to($booking->email)->send(new ThankYouMail($booking));                                                         
        return redirect()->back()->with('message', 'Thank you for booking with us. We will contact you soon.');
    }
}
