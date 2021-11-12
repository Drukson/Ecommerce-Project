<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dzongkhag;
use App\Models\Gewog;
use App\Models\Seller;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
    public function GetVillage($gewog_id){
        $sub = Village::where('gewog_id',$gewog_id)->orderBy('village_name','ASC')->get();
        return json_encode($sub);
    }

    public function StoreSellers(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Seller::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dzongkhag_id' => $request->dzongkhag_id,
            'gewog_id' => $request->gewog_id,
            'village_id' => $request->village_id,
            'category_id' => $request->category_id,
            'status' => 0,
            'password' => Hash::make($request['password']),
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Please wait for Account verification',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



}
