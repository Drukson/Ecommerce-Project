<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function MyOrders(){

        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('orders'));
    }

    public function OrderDetails($order_id)
    {
       // $order = Order::where('id',$order_id)->where('user_id',Auth::id())->first();
        $order = Order::with('division','district','user')
            ->where('id',$order_id)->where('user_id',Auth::id())->first();
        //$orderItem = OrderItem::where('order_id',$order_id)->orderBy('id','DESC')->get();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_details',compact('order','orderItem'));

    } // end mehtod



}
