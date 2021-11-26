<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function MyOrders(){
        $user = User::where('id',Session::get('user_details')['user_id'])->first();
        $orders = Order::where('user_id',Session::get('user_details')['user_id'])->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('orders','user'));
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

    public function InvoiceDownload($order_id){
        $order = Order::with('division','district','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        //return view('frontend.user.order.order_invoice',compact('order','orderItem'));

        $pdf = PDF::loadView('frontend.user.order.order_invoice',
            compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    //RETURNING ORDER
    public function ReturnOrder(Request $request,$order_id)
    {

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);
        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);

    } // end method

    //RETURN ORDER DETAILS
    public function ReturnOrderList()
    {
        $user = User::where('id',Session::get('user_details')['user_id'])->first();
        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.user.order.return_order_view',compact('orders','user'));
    } // end method

    public function CancelOrders()
    {
        $user = User::where('id',Session::get('user_details')['user_id'])->first();
        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.user.order.cancel_order_view',compact('orders','user'));
    }

    public function OrderTracking(Request $request)
    {
        $invoice = $request->code;
        $track = Order::where('invoice_no',$invoice)->first();
        if ($track) {

           //  echo "<pre>";
           //  print_r($track);

            return view('frontend.tracking.track_order',compact('track'));

        }else{
            $notification = array(
                'message' => 'Invoice Code Is Invalid',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }




}
