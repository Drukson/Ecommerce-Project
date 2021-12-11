<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Image;

class SliderController extends Controller
{
    public function SliderView(){
        $slider = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('slider'));
    }

    public function AddSlider(Request $request){

        $validate = $request->validate([
            'slider_image' => 'required|mimes:jpg,png,jpeg'
        ]);

        $sliderImg = $request->file('slider_image');
        $imgName = hexdec(uniqid()). '.'. $sliderImg->getClientOriginalExtension();
        Image::make($sliderImg)->resize(848,370)->save('uploads/slider/' . $imgName);
        $filePath = 'uploads/slider/' . $imgName;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_image' => $filePath,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Slider Added',
            'alert-type' => 'success'
        );
        return Redirect::route('all.slider')->with($notification);
    }

    public function EditSlider($id){
        $slider = Slider::find($id);
        return view('backend.slider.slider_edit', compact('slider'));
    }

    public function UpdateSlider(Request $request, $id)
    {
        $oldImage = Slider::find($id);
        $img = $request->file('slider_image');
        if ($img){
            $imgName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(848,370)->save('uploads/slider/'. $imgName);
            $imagePath = 'uploads/slider/'.$imgName;
            unlink($oldImage->slider_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_image' => $imagePath,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Slider Updated',
                'alert-type' => 'success'
            );

            return Redirect::route('all.slider')->with($notification);

        }else{
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Slider Updated',
                'alert-type' => 'success'
            );
            return Redirect::route('all.slider')->with($notification);
        }
    }

    public function DeleteSlider($id){
        $img = Slider::find($id);
        unlink($img->slider_image);
        $img->delete();
        $notification = array(
            'message' => 'Slider Deleted',
            'alert-type' => 'Danger'
        );
        return Redirect::route('all.slider')->with($notification);
    }

    public function InactiveSlider($id)
    {
        Slider::find($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Slider Inactivated',
            'alert-type' => 'warning'
        );
        return Redirect::back()->with($notification);
    }

    public function ActiveSlider($id)
    {
        Slider::find($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Slider Activated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

}
