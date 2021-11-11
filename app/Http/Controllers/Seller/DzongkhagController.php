<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dzongkhag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DzongkhagController extends Controller
{
    public function DzongkhagView(){

        $dzongkhag = Dzongkhag::latest()->get();
        return view('seller.dzongkhag', compact('dzongkhag'));
    }

    public function AddDzongkhag(Request $request){
        $validate = $request->validate([
            'dzongkhag_name' => 'required|unique:dzongkhags',

        ]);

        Dzongkhag::insert([
            'dzongkhag_name' => $request->dzongkhag_name,
            'slug' => strtolower(str_replace('','-',$request->dzongkhag_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Dzongkhag Added',
            'alert-type' => 'success'
        );
        return Redirect::route('all.dzongkhag')->with($notification);
    }

     public function EditDzongkhag($id){
         $dzongkhag = Dzongkhag::find($id);
         return view('seller.dzongkhag_edit', compact('dzongkhag'));
     }

     public function UpdateDzongkhag(Request $request, $id){

          Dzongkhag::find($id)->update([
              'dzongkhag_name' => $request->dzongkhag_name,
              'slug' => strtolower(str_replace(' ','-',$request->dzongkhag_name)),
              'updated_at' => Carbon::now(),
          ]);

          $notification = array(
              'message' => 'Dzongkhag Updated',
              'alert-type' => 'success'
          );
          return Redirect::route('all.dzongkhag')->with($notification);
      }

     public function DeleteDzongkhag($id)
    {
        $dzongkhag = Dzongkhag::find($id);
        $dzongkhag->delete();

        $notification = array(
            'message' => 'Dzongkhag Deleted',
            'alert-type' => 'success'
        );
        return Redirect::route('all.dzongkhag')->with($notification);
    }
}
