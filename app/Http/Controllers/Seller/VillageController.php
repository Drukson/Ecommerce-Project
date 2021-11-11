<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dzongkhag;
use App\Models\Gewog;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class VillageController extends Controller
{
    public function VillageView(){
        $dzongkhag = Dzongkhag::orderBy('dzongkhag_name', 'ASC')->get();
        $gewog = Gewog::orderBy('gewog_name', 'ASC')->get();
        $village = Village::latest()->get();
        return view('seller.village_view',
            compact('dzongkhag', 'gewog', 'village'));
    }

    // DISPLAYING AUTOLOAD GEWOG DETAILS
    public function GetGewog($dzongkhag_id){
        $subcat = Gewog::where('dzongkhag_id',$dzongkhag_id)->orderBy('gewog_name','ASC')->get();
        return json_encode($subcat);
    }

    public function AddVillage(Request $request){

        Village::insert([
            'dzongkhag_id' => $request->dzongkhag_id,
            'gewog_id' => $request->gewog_id,
            'village_name' => $request->village_name,
            'slug' => strtolower(str_replace(' ', '-', $request->village_name)),
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Village Added',
            'alert-type' => 'success'
        );
        return Redirect::route('all.village')->with($notification);
    }

    public function EditVillage($id){
        $village = Village::find($id);
        $dzongkhag = Dzongkhag::orderBy('dzongkhag_name', 'ASC')->get();
        $gewog = DB::table('gewogs')->where('dzongkhag_id',$village->dzongkhag_id)->get();
       // $gewog = Gewog::orderBy('gewog_name', 'ASC')->get();
        return view('seller.village_edit',
            compact('village', 'dzongkhag','gewog'));
    }



}
