<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show_addresses(Request $req)
    {
        if($req->input('select-address') !== 'make-order')
        {
            return redirect()->route('home');
        }
        $user = Auth::user();
        $addresses = $user->addresses;
        return view('select-address-for-order', ['addresses'=>$addresses]);
    }
    public function show_payment_method(Request $req)
    {
        $address = Address::find($req->input("address_id"));
        return view('show-payment-method', ['address'=>$address]);
    }
    public function handle_orders(Request $req)
    {

        $user = Auth::user();
        if($req->isMethod('get'))
        {
            $orders = $user->orders;
            return view('show-orders', ['orders'=>$orders]);
        }

        $address = Address::find($req->input("address_id"));
        $carts = $user->carts;
        foreach($carts as $cart)
        {
            $order = new Order();
            $order->user_id = $user->id;
            $order->product_id = $cart->product_id;
            $order->address_id = $address->id;
            $order->save();
            $cart->delete();
        }

        return redirect()->route('show-orders')->with('status', 'Order submitted successfully.');
    }
}
