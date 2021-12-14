<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AgroProduct;
use App\Models\Category;
use App\Models\Dzongkhag;
use App\Models\Gewog;
use App\Models\Handicraft;
use App\Models\HandicraftImage;
use App\Models\Homestay;
use App\Models\HomestayImage;
use App\Models\MultiImg;
use App\Models\Review;
use App\Models\Seller;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index(){

        $slider = Slider::where('status', 1)->orderBy('id', 'DESC')->get();
        $agroProduct = AgroProduct::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
        $featured = AgroProduct::where('featured_deals', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $category = Category::orderBy('name','DESC')->get();
        $category_list = Category::get();
        if($category_list!=null && $category_list!="" && sizeof($category_list)>0){
            foreach ($category_list as $cat){
                $cat->product_details = AgroProduct::where('status', 1)->where('category_id', $cat->id)->orderBy('id', 'DESC')->limit(6)->get();
            }
        }
        $handicraft = AgroProduct::where('category_id', 5)->orderBy('id', 'DESC')->limit(6)->get();

       // $categories = Category::orderBy('name','ASC')->get();
       // $products = AgroProduct::where('product_name','LIKE',"%$item%")->get();

        return view('frontend.index', compact('slider', 'category',
            'agroProduct', 'featured', 'category_list'));
    }

    /*private function getsummproduct($type="", $limit= '' ){
        return AgroProduct::where('type')->limit($limit)->get();
    }*/

    /*private function getHandicraft($name="")
    {
        return Category::where('handicrafts', $name)->orderBy('id', 'DESC')->limit(3)->get();
    }*/

    public function destroy(){
        Auth::logout();
        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'warning'
        );
        return Redirect::route('login')->with($notification);
    }

    public function UserProfile()
    {
        $user = User::where('id',Session::get('user_details')['user_id'])->first();
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileUpdate(Request $request){

        $image = User::find(Session::get('user_details')['user_id']);
        $image->name = $request->name;
        $image->email = $request->email;
        $image->phone = $request->phone;
        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
           // unlink(public_path('uploads/user_images/'. $image->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/user_images/'), $filename);
            $image['profile_photo_path'] = $filename;
            $imagepath = 'uploads/user_images/' . $filename;
        }
        $image->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect::route('dashboard')->with($notification);
    }

    public function UserPasswordChange(){
        $user = User::where('id',Session::get('user_details')['user_id'])->first();
        return view('frontend.profile.change_password',compact('user'));
    }

    public function UserPasswordUpdate(Request $request){
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $user_details = User::where('id',Session::get('user_details')['user_id'])->first();
        if (Hash::check($request->oldpassword, $user_details->password )){
            $user_details->password = Hash::make($request->password);
            $user_details->save();
            Auth::logout();
            Session::forget('user_details');
            Session::flush();
            Auth::logout();
            $notification = array(
                'message' => 'User Password Changes Successfully',
                'alert-type' => 'success'
            );
            return Redirect::route('user.logout')->with($notification);
        }
        else{
            return Redirect::back();
        }
    }

    public function ProductDetails($id, $slug)
    {
        $product = AgroProduct::find($id);
        if ($product !== null && $product!=''){
            $user = User::where('id', $product->created_by)->first();
            $seller = Seller::where('id', $user->seller_id)->first();

            if ($seller !== null && $seller!=''){
                $product->seller_details = $seller;
            }
            $related_products = AgroProduct::where('created_by', $product->created_by)->get();
            if ($related_products!== null && $related_products!=''){
                $product->related_productlist = $related_products;
            }
        }
        $multiImg = MultiImg::where('product_id', $id)->get();
        return view('frontend.products.agroproducts.agro_view', compact('product', 'multiImg'));
    }

    public function AgroProductTags($tag)
    {
        $agroProduct = AgroProduct::where('status', 1)->where('product_tag', $tag)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('frontend.tags.agrotags_view', compact('agroProduct', 'categories'));
    }

    public function SubCatProduct(Request $request, $subcat_id, $slug)
    {
         /*dd($slug);*/
        $categories = Category::orderBy('name', 'ASC')->get();
         if ($slug == 'seller'){
             $agros = AgroProduct::where('status', 1)->where('seller_id', $subcat_id)->orderBy('id', 'ASC')->paginate(6);
             /*dd($agros, $subcat_id);*/

             $breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();
         }else{
             $agros = AgroProduct::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'ASC')->paginate(6);
                /*dd($agros);*/
             $breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();
         }
        //$agroProduct = AgroProduct::where('status', 1)->where('product_tag', $tag)->orderBy('id', 'DESC')->paginate(3);

        ///  Load More Product with Ajax
        if ($request->ajax()) {
            $grid_view = view('frontend.products.agroproducts.grid_view_product',compact('agros'))->render();
            return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);
        }
        ///  End Load More Product with Ajax

        return view('frontend.products.agroproducts.subcategory_view',
            compact('agros', 'categories', 'breadsubcat'));
    }

    public function SubCatHandicraft($subcat_id, $slug)
    {
        $agros = AgroProduct::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'ASC')->paginate(3);
        //  $categories = Category::orderBy('name', 'ASC')->get();
        $categories = Category::skip(1)->first();

        /*// HANDICRAFT SUB CATEGORY
        $handicraft = Handicraft::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'ASC')->paginate(3);
        $category = Category::skip(2)->first();*/

        return view('frontend.products.handicraft.subcategory_view',
          compact('agros', 'categories', 'handicraft', 'category'));
    }

    // PRODUCT VIEW WITH MODEL
    public function ProductViewAjax($id)
    {
        $product = AgroProduct::with('category')->find($id);
        return response()->json(array(
            'product' => $product,
        ));
    }

    // Product Search
    public function ProductSearch(Request $request)
    {
        $request->validate(["search" => "required"]);
        $item = $request->search;
        // echo "$item";
        $categories = Category::orderBy('name','ASC')->get();
        $products = AgroProduct::where('product_name','LIKE',"%$item%")->get();
        return view('frontend.products.agroproducts.search',compact('products','categories'));
    }

    ///// Advance Search Options
    public function SearchProduct(Request $request)
    {
        $request->validate(["search" => "required"]);
        $item = $request->search;

        $products = AgroProduct::where('product_name','LIKE',"%$item%")->select('product_name','product_thumbnail')->limit(5)->get();
        return view('frontend.products.agroproducts.search_product',compact('products'));
    }

    public function SellerDetails($gewog_id = '')
    {

        $seller = Seller::where('gewog_id',$gewog_id)->where('status', 2)->get();
        if ($seller != null && $seller!='' && sizeof($seller)>0)
        {
            foreach ($seller as $sell){
                $dzongkhag = Dzongkhag::where('id', $sell->dzongkhag_id)->first();
                if ($dzongkhag != null && $dzongkhag!=''){
                    $sell->dzongkhag_name =  $dzongkhag->dzongkhag_name;
                }
                $gewog = Gewog::where('id', $sell->gewog_id)->first();
                if ($gewog != null && $gewog!=''){
                    $sell->gewog_name = $gewog->gewog_name;
                }
            }
        }
        return view('frontend.seller.seller_details', compact('seller'));
    }

    public  function loadproducts($cat_id = '')
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $breadsubcat = SubCategory::with(['category'])->where('category_id',$cat_id)->get();
        $agros=[];
        if($cat_id==1){
            $product = AgroProduct::where('status', 1)->where('category_id', $cat_id)->get();
            if($product!=null && $product!=""){
                foreach ($product as $pro){
                    array_push($agros, $pro);
                }
            }
        }else{
            $subcat = SubCategory::where('category_id', $cat_id)->get();
            if ($subcat !== null && $subcat !=''){
                foreach ($subcat as $cat){
                    $product = AgroProduct::where('status', 1)->where('subcategory_id', $cat->id)->get();
                    if($product!=null && $product!=""){
                        foreach ($product as $pro){
                            array_push($agros, $pro);
                        }
                    }
                }
            }
        }
        return view('frontend.products.agroproducts.subcategory_view',
            compact('agros', 'categories', 'breadsubcat'));
    }

    public function StoreSubscribers(Request $request){
        $det = Subscriber::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Thank you for your subscription',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function ViewSubscribers()
    {
        $subscriber = Subscriber::orderBy('id', 'DESC')->get();
        return view('backend.subscriber.subscriber_view', compact('subscriber'));
    }

}
