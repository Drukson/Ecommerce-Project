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

        // Displaying Homestay Category
        $skip_category_homestay = Category::skip(0)->first();
        $skip_product_homestay = Homestay::where('status', 1)->where('category_id', $skip_category_homestay->id)
            ->orderBy('id', 'DESC')->get();

        // Displaying Handicraft Category
        $skip_category_handicraft = Category::skip(2)->first();
        $skip_product_handicraft = Handicraft::where('status', 1)->where('category_id', $skip_category_handicraft->id)
            ->orderBy('id', 'DESC')->get();

        return view('frontend.index', compact('slider', 'category',
            'agroProduct', 'featured', 'skip_category_homestay', 'skip_product_homestay',
        'skip_category_handicraft', 'skip_product_handicraft'));
    }

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

    public function HomestayDetails($id, $slug)
    {
        $homestay = Homestay::find($id);
        $homestayimage = HomestayImage::where('homestay_id', $id)->get();
        return view('frontend.products.homestay.homestay_view', compact('homestay', 'homestayimage'));
    }

    public function HandicraftDetails($id, $slug)
    {
        $handicraft = Handicraft::find($id);
        $handicraftimage = HandicraftImage::where('handicraft_id', $id)->get();
        return view('frontend.products.handicraft.handicraft_view', compact('handicraft', 'handicraftimage'));
    }

    public function AgroProductTags($tag)
    {
        $agroProduct = AgroProduct::where('status', 1)->where('product_tag', $tag)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('frontend.tags.agrotags_view', compact('agroProduct', 'categories'));
    }

    public function HandicraftProductTags($tag)
    {
        $handicraft = Handicraft::where('status', 1)->where('handicraft_tag', $tag)->orderBy('id', 'ASC')->paginate(3);
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('frontend.tags.handicrafttags_view', compact('handicraft', 'categories'));
    }

    public function HomestayProductTags($tag)
    {
        $homestay = Homestay::where('status', 1)->where('homestay_tag', $tag)->orderBy('id', 'ASC')->paginate(3);
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('frontend.tags.homestaytags_view', compact('homestay', 'categories'));
    }

    public function SubCatProduct($subcat_id, $slug)
    {
        $agros = AgroProduct::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'ASC')->paginate(3);
      // $categories = Category::orderBy('name', 'ASC')->get();
        $categories = Category::skip(1)->first();

    // HANDICRAFT SUB CATEGORY
        $handicraft = Handicraft::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'ASC')->paginate(3);
        $category = Category::skip(2)->first();

        return view('frontend.products.agroproducts.subcategory_view',
            compact('agros', 'categories', 'handicraft', 'category'));
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

}
