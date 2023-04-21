<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingEnquery;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count['user'] = User::Role('USER')->count();
        $count['hold_order'] = Order::where('order_status', false)->count();
        $count['order'] = Order::where('order_status', true)->count();
        $count['order_this_month'] = Order::whereMonth('created_at', date('m'))->count();
        $count['call_back'] = BookingEnquery::orderBy('id', 'DESC')->where('voucher_code', '!=', null)->count();
        $count['newsletter'] = Newsletter::count();
        $callbacks = BookingEnquery::orderBy('id', 'DESC')->where('voucher_code', '!=', null)->get();
        return view('admin.dashboard')->with(compact('count','callbacks'));
    }

}
