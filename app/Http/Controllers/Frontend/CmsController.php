<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('package_price', 'asc')->get();
        return view('frontend.home')->with(compact('packages'));
    }

    public function aboutUs()
    {
        return view('frontend.about');
    }

    // how it works
    public function howItWorks()
    {
        return view('frontend.how-it-works');
    }

    // our hotels
    public function ourHotels()
    {
        return view('frontend.hotels');
    }
}
