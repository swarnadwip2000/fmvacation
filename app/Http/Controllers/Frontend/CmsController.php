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

    // privacy policy
    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }

    // terms and conditions
    public function termsAndConditions()
    {
        return view('frontend.terms-and-conditions');
    }

    // australia
    public function australia()
    {
        return view('frontend.australia');
    }

    // aus to new zealand
    public function ausToNewZealand()
    {
        return view('frontend.aus-to-new-zealand');
    }

    // new zealand
    public function newZealandToBali()
    {
        return view('frontend.new-zealand-to-bali');
    }


}
