<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function ourPackage()
    {
        $packages = Package::orderBy('package_price', 'asc')->get();
        return view('frontend.our-package')->with(compact('packages'));
    }

    public function package($id)
    {
        $id = decrypt($id);
        $package = Package::find($id);
        return view('frontend.package')->with(compact('package'));
    }
}
