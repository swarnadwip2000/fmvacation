<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingEnquery;
use Illuminate\Http\Request;

class EnqueryConrtoller extends Controller
{
    public function enquiry()
    {
       $enquiries = BookingEnquery::orderBy('id', 'DESC')->get();
        return view('admin.enquiry.list', compact('enquiries'));
    }
}
