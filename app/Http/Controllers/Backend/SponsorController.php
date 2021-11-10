<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Image;

class SponsorController extends Controller
{
    public function SponsorView(){
        $sponsor = Sponsor::latest()->get();
        return view('backend.sponsor.sponsor_view', compact('sponsor'));
    }

    public function AddSponsor(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:1999'
        ]);

        $img = $request->file('image');
        $imgName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(300,300)->save('uploads/sponsor_image/' . $imgName);
       // Image::make($img)->resize(300,300)->save('uploads/sponsor_image/'.$imgName);
       // $img->move(public_path('uploads/sponsor_image/'), $imgName);
        $filePath = 'uploads/sponsor_image/' . $imgName;

        Sponsor::insert([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $filePath,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Sponsor Added',
            'alert-type' => 'success'
        );
        return Redirect::route('all.sponsors')->with($notification);
    }

    public function EditSponsor($id){
        $sponsor = Sponsor::findOrFail($id);
        return view('backend.sponsor.sponsor_edit', compact('sponsor'));
    }

    public function UpdateSponsor(Request $request, $id)
    {
        $oldImage = $request->oldImage;
        $img = $request->file('image');
        if ($img){
        $imgName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(300,300)->save('uploads/sponsor_image/'. $imgName);
        $imagePath = 'uploads/sponsor_image/'.$imgName;
        unlink($oldImage);

        Sponsor::find($id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imagePath,
            'updated_at' => Carbon::now(),
        ]);

            $notification = array(
                'message' => 'Implementing Partners Updated',
                'alert-type' => 'success'
            );

            return Redirect::route('all.sponsors')->with($notification);

        }else{
            Sponsor::find($id)->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Implementing Partners Updated',
                'alert-type' => 'success'
            );
            return Redirect::route('all.sponsors')->with($notification);
        }
    }

    public function DeleteSponsor($id)
    {
        $userid = Sponsor::find($id);
        $image = $userid->image;
        unlink($image);

        $userid->delete();
        $notification = array(
            'message' => 'Data Deleted',
            'alert-type' => 'warning'
        );
        return Redirect::route('all.sponsors')->with($notification);
    }


}



