<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\AgroProduct;
use App\Models\Category;
use App\Models\Dzongkhag;
use App\Models\Gewog;
use App\Models\Review;
use App\Models\Seller;
use App\Models\Role;
use App\Models\User;
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

    /*DISPLAY ALL SELLER IN THE ADMIN*/
    public function SellerDetails()
    {
        $seller = Seller::where('status',1)->get();
        $dzongkhag = Dzongkhag::orderBy('dzongkhag_name', 'ASC')->get();
        $gewog = Gewog::orderBy('gewog_name', 'ASC')->get();
        $village = Village::orderBy('village_name', 'ASC')->get();
        $category = Category::orderBy('name', 'ASC')->get();

        return view('seller.seller_details',
            compact('dzongkhag', 'gewog', 'village', 'category', 'seller'));
    }

    public function EditSellerDetails($id)
    {
        $seller = Seller::where('id',$id)->first();
        $cat='';
        if($seller->category_id!=null && $seller->category_id!=""){
            $subids=explode(', ',$seller->category_id);
            foreach($subids as $id){
                if($id!=null && $id!=""){
                    $cat=$cat.Category::where('id',trim($id))->first()->name.', ';
                }
            }
        }
        $subcategory = SubCategory::find($id);
        $dzongkhag = Dzongkhag::orderBy('dzongkhag_name', 'ASC')->get();
        $gewog = Gewog::orderBy('gewog_name', 'ASC')->get();
        $village = Village::orderBy('village_name', 'ASC')->get();
        $category = Category::orderBy('name', 'ASC')->get();
        return view('seller.edit_seller_details',
        compact('seller', 'dzongkhag', 'gewog', 'village', 'cat','category', 'subcategory'));
    }
    public function update_seller(Request $request){
        $status=2; //approve
        if($request->action=="Reject"){
            $status=3;//Rejected
        }
        Seller::find($request->recordId)->update([
            'varification_remarks' => $request->verification_remarks,
            'status' => $status,
            'updated_at' => Carbon::now(),
        ]);
        $userdet=Seller::where('id',$request->recordId)->first();
        $roleid=Role::where('name','Seller')->first();
        $checkuser=User::where('email',$userdet->email)->first();
        if($status==2 && $checkuser==""){
            User::insert([
                'name' => $userdet->name,
                'email' => $userdet->email,
                'phone' => $userdet->phone,
                'password' => $userdet->password,
                'role_id' => $roleid->id,
                'seller_id' => $userdet->id,
                'status' => 1,
                'created_at' => Carbon::now()
            ]);
        }
        return Redirect::route('all_sellers');
        // $message="Seller Details has been updated";
        // return view('admin.acknowledgement',compact('message'));
    }

    public function GetVillage($gewog_id){
        $sub = Village::where('gewog_id',$gewog_id)->orderBy('village_name','ASC')->get();
        return json_encode($sub);
    }

    public function StoreSellers(Request $request){
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
            'status' => 1,//submittted
            'remarks' => $request->remarks,
            'password' => Hash::make($request['password']),
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Your registration has beed submitted. Please wait for Account verification',
            'alert-type' => 'success'
        );
        $message="You registration details has been submitted for approval. Please wait for Account verification.";
        return view('seller.registration_acknowledgement',compact('message'))->with($notification);
    }

}
