<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendVoucherCode;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class OrderController extends Controller
{
    public function holdOrder()
    {
        $orders = Order::orderBy('id', 'DESC')->where('order_status', false)->get();
        return view('admin.hold-order.list')->with(compact('orders')); 
    }
    
    public function activeOrder($id)
    {
        Order::where('id', $id)->update(['order_status' => true]);
        $order = Order::find($id);
        Mail::to($order->send_to)->send(new SendVoucherCode($order));
        return redirect()->route('orders.index')->with('message', 'Order has been activated successfully.');
    }

    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->where('order_status', true)->get();
        return view('admin.order.list')->with(compact('orders'));
    }

    public function resendVoucher($id)
    {
        $order = Order::find($id);
        Mail::to($order->send_to)->send(new SendVoucherCode($order));
        return redirect()->back()->with('message', 'Mail has been sent');
    }

    public function downloadVoucher($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('frontend.pdf.voucher', [
            'order' => $order,
        ])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('voucher.pdf');
    }

    public function view($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.view')->with(compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.hold-order.edit')->with(compact('order'));
    }

    public function update(Request $request)
    {
        // return $request->all();
        $request->validate([
            'send_to' => 'required',
            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
            'shipping_address' => 'required',
            'shipping_country' => 'required',
            'shipping_state' => 'required',
            'shipping_zipcode' => 'required',
            'billing_first_name' => 'required',
            'billing_last_name' => 'required',
            'billing_address' => 'required',
            'billing_country' => 'required',
            'billing_state' => 'required',
            'billing_zipcode' => 'required',
        ],[
            'send_to.required' => 'Email is required',
            'shipping_first_name.required' => 'Shipping First Name is required',
            'shipping_last_name.required' => 'Shipping Last Name is required',
            'shipping_address.required' => 'Shipping Address is required',
            'shipping_country.required' => 'Shipping Country is required',
            'shipping_state.required' => 'Shipping State is required',
            'shipping_zipcode.required' => 'Shipping Zipcode is required',
            'billing_first_name.required' => 'Billing First Name is required',
            'billing_last_name.required' => 'Billing Last Name is required',
            'billing_address.required' => 'Billing Address is required',
            'billing_country.required' => 'Billing Country is required',
            'billing_state.required' => 'Billing State is required',
            'billing_zipcode.required' => 'Billing Zipcode is required',
        ]);

        $order = Order::findOrFail($request->id);
        $order->send_to = $request->send_to;
        $order->shipping_first_name = $request->shipping_first_name;
        $order->shipping_last_name = $request->shipping_last_name;
        $order->shipping_address = $request->shipping_address;
        $order->shipping_country = $request->shipping_country;
        $order->shipping_state = $request->shipping_state;
        $order->shipping_zipcode = $request->shipping_zipcode;
        $order->billing_first_name = $request->billing_first_name;
        $order->billing_last_name = $request->billing_last_name;
        $order->billing_address = $request->billing_address;
        $order->billing_country = $request->billing_country;
        $order->billing_state = $request->billing_state;
        $order->billing_zipcode = $request->billing_zipcode;
        $order->save();
        return redirect()->route('orders.hold')->with('message', 'Order has been updated successfully.');
    }
}
