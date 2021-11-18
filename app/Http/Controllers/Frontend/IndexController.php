<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AgroProduct;
use App\Models\Category;
use App\Models\Handicraft;
use App\Models\HandicraftImage;
use App\Models\Homestay;
use App\Models\HomestayImage;
use App\Models\MultiImg;
use App\Models\Slider;
use App\Models\SubCategory;
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

       // $categories = Category::orderBy('name','ASC')->get();
       // $products = AgroProduct::where('product_name','LIKE',"%$item%")->get();

        return view('frontend.index', compact('slider', 'category',
            'agroProduct', 'featured'));
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
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileUpdate(Request $request){

        $image = User::find(Auth::user()->id);
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
        return view('frontend.profile.change_password');
    }

    public function UserPasswordUpdate(Request $request){
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashedPassword = User::find(Auth::user()->id)->password;
        if (Hash::check($request->oldpassword, $hashedPassword )){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'User Password Changes Successfully',
                'alert-type' => 'success'
            );
            return Redirect::route('user.logout')->with($notification);
        }else{
            return Redirect::back();
        }
    }

    public function ProductDetails($id, $slug)
    {
        $product = AgroProduct::find($id);
        $multiImg = MultiImg::where('product_id', $id)->get();
        return view('frontend.products.agroproducts.agro_view', compact('product', 'multiImg'));
    }



    public function AgroProductTags($tag)
    {
        $agroProduct = AgroProduct::where('status', 1)->where('product_tag', $tag)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('frontend.tags.agrotags_view', compact('agroProduct', 'categories'));
    }


    public function SubCatProduct($subcat_id, $slug)
    {
        // dd($subcat_id);
        $agros = AgroProduct::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'ASC')->paginate(3);
        $categories = Category::orderBy('name', 'ASC')->get();
       // $categories = Category::skip(1)->first();

        $breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();
        //$agroProduct = AgroProduct::where('status', 1)->where('product_tag', $tag)->orderBy('id', 'DESC')->paginate(3);

        return view('frontend.products.agroproducts.subcategory_view',
            compact('agros', 'categories', 'breadsubcat'));
    }

    public function SubCatHandicraft($subcat_id, $slug)
    {
        $agros = AgroProduct::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'ASC')->paginate(3);
        //  $categories = Category::orderBy('name', 'ASC')->get();
        $categories = Category::skip(1)->first();

        // HANDICRAFT SUB CATEGORY
        $handicraft = Handicraft::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'ASC')->paginate(3);
        $category = Category::skip(2)->first();

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

}
