<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dzongkhag;
use App\Models\Gewog;
use App\Models\Seller;
use App\Models\SubCategory;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SellerController extends Controller
{
    public function Registration()
    {
        $dzongkhag = Dzongkhag::orderBy('dzongkhag_name', 'ASC')->get();
        $gewog = Gewog::orderBy('gewog_name', 'ASC')->get();
       // $village = Village::latest()->get();
        $village = Village::orderBy('village_name', 'ASC')->get();
        $category = Category::orderBy('name', 'ASC')->get();

        return view('seller.seller_registration_index',
            compact('dzongkhag', 'gewog', 'village', 'category'));
    }

    /*DISPLAY YALL SELLER IN THE ADMIN*/
    public function SellerDetails()
    {
        $seller = Seller::latest()->get();
        $dzongkhag = Dzongkhag::orderBy('dzongkhag_name', 'ASC')->get();
        $gewog = Gewog::orderBy('gewog_name', 'ASC')->get();
        $village = Village::orderBy('village_name', 'ASC')->get();
        $category = Category::orderBy('name', 'ASC')->get();

        return view('seller.seller_details',
            compact('dzongkhag', 'gewog', 'village', 'category', 'seller'));
    }

    public function EditSellerDetails($id)
    {
        $seller = Seller::find($id);
        $subcategory = SubCategory::find($id);
        $dzongkhag = Dzongkhag::orderBy('dzongkhag_name', 'ASC')->get();
        $gewog = Gewog::orderBy('gewog_name', 'ASC')->get();
        $village = Village::orderBy('village_name', 'ASC')->get();
        $category = Category::orderBy('name', 'ASC')->get();

        return view('seller.edit_seller_details',
            compact('seller', 'dzongkhag', 'gewog', 'village', 'category', 'subcategory'));
    }

    public function GetVillage($gewog_id){
        $sub = Village::where('gewog_id',$gewog_id)->orderBy('village_name','ASC')->get();
        return json_encode($sub);
    }

    public function StoreSellers(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required | email|unique:sellers,email',
            'phone' => 'required',
            'category_id' => 'required',
        ]);
        $cat="";
        if(isset($request->category_id) && $request->category_id!=null && $request->category_id!="" && sizeof($request->category_id)>0){
            foreach ($request->category_id as $ca){
                $cat=$cat.$ca.', ';
            }
        }
        Seller::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dzongkhag_id' => $request->dzongkhag_id,
            'gewog_id' => $request->gewog_id,
            'village_id' => $request->village_id,
            'category_id' => $cat,
            'status' => 0,
            'remarks' => $request->remarks,
            'password' => Hash::make($request['password']),
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Please wait for Account verification',
            'alert-type' => 'success'
        );
        return view('seller.registration_acknowledgement')->with($notification);
    }

}
