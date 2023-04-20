<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function newsletter()
    {
        $newsletters = Newsletter::orderBy('id', 'DESC')->get();
        return view('admin.newsletter.list')->with(compact('newsletters'));
    }
}
