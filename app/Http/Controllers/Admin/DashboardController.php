<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.dashboard')->with(compact('count'));
    }

}
