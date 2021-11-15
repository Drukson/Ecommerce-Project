<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function CheckoutStore(Request $request)
    {

        // dd($request->all());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['address'] = $request->address;
        $cartTotal = Cart::total();


        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe',compact('data', 'cartTotal'));
        }elseif ($request->payment_method == 'card') {
            return 'card';
        }else{
            return 'cash';
        }
    }
}
