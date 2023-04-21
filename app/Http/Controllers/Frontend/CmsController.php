<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    // newsletter ajax submit
    public function newsletter(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);


        if ($validator->fails()) {
            $errors['message'] = [];
            $data = explode(',', $validator->errors());

            for ($i = 0; $i < count($validator->errors()); $i++) {
                // return $data[$i];
                $dk = explode('["', $data[$i]);
                $ck = explode('"]', $dk[1]);
                $errors['message'][$i] = $ck[0];
            }
            return response()->json(['status' => false, 'error' => $errors['message'][0]]);
        }
      
        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();

        return response()->json(['success' => 'Thank you for subscribing to our newsletter.', 'status' => true]);
    }
}
