<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Dzongkhag;
use App\Models\Gewog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GewogController extends Controller
{
    public function GewogView(){

        $gewog = Gewog::latest()->get();
        $dzongkhag = Dzongkhag::orderBy('dzongkhag_name', 'ASC')->get();
        return view('seller.gewog', compact('gewog', 'dzongkhag'));
    }

    public function AddGewog(Request $request){
        $validate = $request->validate([
            'gewog_name' => 'required',
            'dzongkhag_id' => 'required'
        ]);

        Gewog::insert([
            'dzongkhag_id' => $request->dzongkhag_id,
            'gewog_name' => $request->gewog_name,
            'slug' => strtolower(str_replace(' ','-',$request->gewog_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Gewog Added',
            'alert-type' => 'success'
        );
        return Redirect::route('all.gewog')->with($notification);
    }

    public function EditGewog($id){
         $gewog = Gewog::find($id);
         $dzongkhag = Dzongkhag::orderBy('dzongkhag_name', 'ASC')->get();
         return view('seller.gewog_edit', compact('gewog', 'dzongkhag'));
     }

    public function UpdateGewog(Request $request, $id){
         $validate = $request->validate([
             'gewog_name' => 'required',
             'dzongkhag_id' => 'required'
         ]);

         Gewog::find($id)->update([
             'dzongkhag_id' => $request->dzongkhag_id,
             'gewog_name' => $request->gewog_name,
             'slug' => strtolower(str_replace('','-',$request->gewog_name)),
             'updated_at' => Carbon::now(),
         ]);

         $notification = array(
             'message' => 'Gewog Updated',
             'alert-type' => 'success'
         );
         return Redirect::route('all.gewog')->with($notification);
     }

    public function DeleteGewog($id)
     {
         $gewog = Gewog::find($id);
         $gewog->delete();

         $notification = array(
             'message' => 'Gewog Deleted',
             'alert-type' => 'success'
         );
         return Redirect::route('all.gewog')->with($notification);
     }
}
