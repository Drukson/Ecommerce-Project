<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AgroProduct;
use App\Models\Category;
use App\Models\Handicraft;
use App\Models\HandicraftImage;
use App\Models\Homestay;
use App\Models\HomestayImage;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Image;

class HandicraftController extends Controller
{
    public function HandicraftView()
    {
        $handicraft = Handicraft::latest()->get();
        return view('backend.products.handicraft.handicraft_view', compact('handicraft'));
    }

    public  function AddHandicraft()
    {
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();

        $handicraft = Handicraft::latest()->get();
        return view('backend.products.handicraft.handicraft_add', compact('handicraft',
        'category', 'subcategory'));
    }

    public function StoreHandicraft(Request $request){

        $img = $request->file('handicraft_thumbnail');
        $imgName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,900)->save('uploads/handicraft/thumbnail/' . $imgName);
        $filePath = 'uploads/handicraft/thumbnail/' . $imgName;

        $handicraft_id = Handicraft::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'handicraft_name' => $request->handicraft_name,
            'handicraft_slug' => strtolower(str_replace(' ', '-', $request->handicraft_name)),
            'handicraft_code' => $request->handicraft_code,
            'handicraft_qty' => $request->handicraft_qty,
            'handicraft_tag' => $request->handicraft_tag,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,

            'handicraft_thumbnail' => $filePath,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        /* Multiple Image Uploads */
        $multiImg = $request->file('handicraft_img');
        foreach ($multiImg as $images){
            $multiImgName = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
            Image::make($images)->resize(800,900)->save('uploads/handicraft/multiimage/' . $multiImgName);
            $uploadPath = 'uploads/handicraft/multiimage/' . $multiImgName;

            HandicraftImage::insert([
                'handicraft_id' => $handicraft_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        /*   Ends here           */
        $notification = array(
            'message' => 'Data Uploaded',
            'alert-type' => 'success'
        );
        return Redirect::route('all.handicraft')->with($notification);
    }

    public function EditHandicraft($id){

        $multiImage = HandicraftImage::where('handicraft_id', $id)->get();

        $handicraft = Handicraft::find($id);
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        // $multiImage = MultiImg::find($id);
        return view('backend.products.handicraft.handicraft_edit', compact('handicraft', 'multiImage',
            'category', 'subcategory'));
    }

    public function UpdateHandicraft(Request $request, $id){
        Handicraft::find($id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'handicraft_name' => $request->handicraft_name,
            'handicraft_slug' => strtolower(str_replace(' ', '-', $request->handicraft_name)),
            'handicraft_code' => $request->handicraft_code,
            'handicraft_qty' => $request->handicraft_qty,
            'handicraft_tag' => $request->handicraft_tag,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,

            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Handicraft Details Updated without Image',
            'alert-type' => 'success'
        );
        return Redirect::route('all.handicraft')->with($notification);
    }

    public function DeleteHandicraftImages($id){
        $oldImg = HandicraftImage::find($id);
        unlink($oldImg->photo_name);

        HandicraftImage::find($id)->delete();
        $notification = array(
            'message' => 'Image Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function UpdateHandicraftThumbnail(Request $request, $id)
    {
        $image = $request->handicraft_thumbnail;
        $imgDel = Handicraft::find($id);

        $genName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,900)->save('uploads/handicraft/thumbnail/' . $genName);
        $ImgPath = 'uploads/handicraft/thumbnail/' . $genName;

        unlink($imgDel->handicraft_thumbnail);

        Handicraft::find($id)->update([
            'handicraft_thumbnail' => $ImgPath,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Handicraft Thumbnail Updated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function InactiveHandicraft($id){
        Handicraft::find($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Handicraft Inactivated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function ActiveHandicraft($id){
        Handicraft::find($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Handicraft Activated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function DeleteHandicraftProduct($id){

        $handicraft = Handicraft::find($id);
        unlink($handicraft->handicraft_thumbnail);
        Handicraft::find($id)->delete();

        $images = HandicraftImage::where('handicraft_id', $id)->get();
        foreach ($images as $img){
            unlink($img->photo_name);
            HomestayImage::where('handicraft', $id)->delete();
        }
        $notification = array(
            'message' => 'Handicraft Details Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

}
