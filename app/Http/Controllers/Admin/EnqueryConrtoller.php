<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EnquiryStatusMail;
use App\Models\BookingEnquery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnqueryConrtoller extends Controller
{
    public function enquiry()
    {
       $enquiries = BookingEnquery::orderBy('id', 'DESC')->where('voucher_code', null)->get();
        return view('admin.enquiry.list', compact('enquiries'));
    }

    public function callback()
    {
        $callbacks = BookingEnquery::orderBy('id', 'DESC')->where('voucher_code', '!=', null)->get();
        return view('admin.callback.list', compact('callbacks'));
    }

    public function status(Request $request)
    {
        if ($request->ajax()) {
            $enquiry = BookingEnquery::find($request->id);
            $enquiry->status = $request->status;
            $enquiry->save();
            Mail::to($enquiry->email)->send(new EnquiryStatusMail($enquiry));
            return response()->json(['message' => 'Status updated successfully.', 'status' => 'success']);
        }
    }
}
