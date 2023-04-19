<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use App\Models\Cart;
use App\Models\DeliverAddress;
use App\Models\Order;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe;
use Omnipay\Omnipay;

class OrderController extends Controller
{
    private $gateway;
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function checkout()
    {
        $package = Cart::where('user_id', Auth::user()->id)->first();
        $count = DeliverAddress::where('user_id', Auth::user()->id)->count();
        if ($count > 0) {
            $address = DeliverAddress::where('user_id', Auth::user()->id)->first();
        } else {
            $address = null;
        }
        return view('frontend.checkout')->with(compact('package', 'address'));
    }

    public function saveAddress(Request $request)
    {
        // save address to my account
        $data = $request->all();
        $count = DeliverAddress::where('user_id', Auth::user()->id)->count();
        if ($count > 0) {
            $address = DeliverAddress::where('user_id', Auth::user()->id)->first();
            $address->user_id = Auth::user()->id;
            $address->first_name = $data['first_name'];
            $address->last_name = $data['last_name'];
            $address->address = $data['address'];
            $address->state = $data['state'];
            $address->country = $data['country'];
            $address->zipcode = $data['zipcode'];
            $address->save();
        } else {
            $address = new DeliverAddress();
            $address->user_id = Auth::user()->id;
            $address->first_name = $data['first_name'];
            $address->last_name = $data['last_name'];
            $address->address = $data['address'];
            $address->state = $data['state'];
            $address->country = $data['country'];
            $address->zipcode = $data['zipcode'];
            $address->save();
        }
        return redirect()->back()->with('flash_message_success', 'Address has been saved');
    }

    public  function generateRandomString($length = 20)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function checkoutStore(Request $request)
    {
        // return env('STRIPE_CLIENT_ID');
        $request->validate([
            'shipping_first_name'     => 'required',
            'shipping_last_name'     => 'required',
            'shipping_address'    => 'required',
            'shipping_state' => 'required',
            'shipping_country' => 'required',
            'shipping_zipcode' => 'required',
            'billing_first_name'     => 'required',
            'billing_last_name'     => 'required',
            'billing_address'    => 'required',
            'billing_state' => 'required',
            'billing_country' => 'required',
            'billing_zipcode' => 'required',

        ], [
            'shipping_first_name.required' => 'Please fill the filed.',
            'shipping_last_name.required' => 'Please fill the filed.',
            'shipping_address.required' => 'Please fill the filed.',
            'shipping_state.required' => 'Please fill the filed.',
            'shipping_country.required' => 'Please fill the filed.',
            'shipping_zipcode.required' => 'Please fill the filed.',
            'billing_first_name.required' => 'Please fill the filed.',
            'billing_last_name.required' => 'Please fill the filed.',
            'billing_address.required' => 'Please fill the filed.',
            'billing_state.required' => 'Please fill the filed.',
            'billing_country.required' => 'Please fill the filed.',
            'billing_zipcode.required' => 'Please fill the filed.',
        ]);

        try {
            $package = Package::where('id', $request->package_id)->first();
            $response = $this->gateway->purchase([
                'amount' => $package['package_price'],
                'currency' => 'USD',
                'returnUrl' => route('payment.success'),
                'cancelUrl' => route('payment.cancel'),
            ])->send();
            
            if ($response->isRedirect()) {
                Session::put('package_id', $request->package_id);
                Session::put('billing_first_name', $request->billing_first_name);
                Session::put('billing_last_name', $request->billing_last_name);
                Session::put('billing_address', $request->billing_address);
                Session::put('billing_state', $request->billing_state);
                Session::put('billing_country', $request->billing_country);
                Session::put('billing_zipcode', $request->billing_zipcode);

                $response->redirect();
            } else {
                return redirect()->back()->with('error', $response->getMessage());
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ]);

            $response = $transaction->send();
            if ($response->isSuccessful()) {
                $arr = $response->getData();
                $package = Package::where('id', Session::get('package_id'))->first();
                $order_number = uniqid('FM-');

                $cart = Cart::where('user_id', Auth::user()->id)->first();
                $deliverAddress = DeliverAddress::where('user_id', Auth::user()->id)->first();

                $order = new Order();
                $order->user_id = Auth::user()->id;
                // unique order id
                $order->order_number = $order_number;
                $order->package_id = Session::get('package_id');
                $order->send_to = $cart->send_to;
                $order->send_from = $cart->send_from;
                $order->send_message = $cart->send_message;
                $order->delivery_method = $cart->delivery_method;
                $order->shipping_first_name = $deliverAddress->first_name;
                $order->shipping_last_name = $deliverAddress->last_name;
                $order->shipping_address = $deliverAddress->address;
                $order->shipping_state = $deliverAddress->state;
                $order->shipping_country = $deliverAddress->country;
                $order->shipping_zipcode = $deliverAddress->zipcode;
                $order->billing_first_name = Session::get('billing_first_name');
                $order->billing_last_name = Session::get('billing_last_name');
                $order->billing_state = Session::get('billing_state');
                $order->billing_country = Session::get('billing_country');
                $order->billing_zipcode = Session::get('billing_zipcode');
                $order->billing_address = Session::get('billing_address');
                // unique alphpanumeric vouchger code
                $order->voucher_code = $this->generateRandomString(8);
                $order->grand_total = $package->package_price;
                $order->save();

                // payment details
                $payment = new Payment();
                $payment->order_id = $order->id;
                $payment->payment_method = 'Paypal';
                $payment->payment_status = 'Paid';
                $payment->transaction_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payment_amount = $arr['transactions'][0]['amount']['total'];
                $payment->payment_currency = 'USD';
                $payment->save();

                // delete cart

                $cart->delete();
                Mail::to(Auth::user()->email)->send(new OrderConfirmation($order));
                Session::forget('package_id');
                Session::forget('billing_first_name');
                Session::forget('billing_last_name');
                Session::forget('billing_address');
                Session::forget('billing_state');
                Session::forget('billing_country');
                Session::forget('billing_zipcode');
                
                return redirect()->route('orders')->with('message', 'Order has been placed successfully');
            } else {
                return redirect()->back()->with('error', $response->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Payment failed');
        }
    }
}
