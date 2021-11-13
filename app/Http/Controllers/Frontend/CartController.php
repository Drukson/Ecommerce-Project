<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AgroProduct;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = AgroProduct::find($id);

        if ($product->discount_price ==NULL){
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail
                ]
            ]);
            return response()->json(['success' => 'Product added to cart']);

        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail
                ]
            ]);
            return response()->json(['success' => 'Product added to cart']);
        }
    }

    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart']);
    }

    // WISHLIST DETAILS
    public function AddtoWishlist(Request $request, $product_id)
    {
        if (Auth::check()){

            $userexist = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

           if (!$userexist){
               Wishlist::insert([
                   'user_id' => Auth::id(),
                   'product_id' => $product_id,
                   'created_at' => Carbon::now()
               ]);
               return response()->json(['success' => 'Items Added Successfully']);
           }else{
               return response()->json(['error' => 'This product has been added already']);
           }

        }else{
            return response()->json(['error' => 'Please Login to Continue']);
        }
    }

    //CHECKOUT PAGE
    public function CheckoutCreate()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                //PASSING DIVISION AND DISTRICT VALUES TO THE VIEW PAGE
                $division = ShipDivision::orderBy('division_name', 'ASC')->get();

                return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal', 'division'));

            }else{
                $notification = array(
                    'message' => 'Shop At list One Product',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }

    }

    // DISPLAYING AUTOLOAD DISTRICT DETAILS
    public function GetDistrict($division_id){
        $subcat = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($subcat);
    }



}
