<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AgroProduct;
use App\Models\Category;
use App\Models\Homestay;
use App\Models\HomestayImage;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Image;

class HomestayController extends Controller
{
   public function HomestayIndex()
   {
        $homestay = Homestay::latest()->get();
        return view('backend.products.homestay.homestay_view',  compact('homestay'));
   }

   public function ManageHomestayProducts()
   {
       $category = Category::latest()->get();
       return view('backend.products.homestay.homestay_add', compact('category'));
   }

   public function AddHomestayProduct(Request $request)
   {
       $img = $request->file('homestay_thumbnail');
       $imgName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
       Image::make($img)->resize(800,900)->save('uploads/homestay/thumbnail/' . $imgName);
       $filePath = 'uploads/homestay/thumbnail/' . $imgName;

       $homestay_id = Homestay::insertGetId([
           'category_id' => $request->category_id,
           'name' => $request->name,
           'slug' => strtolower(str_replace(' ', '-', $request->name)),
           'no_of_rooms' => $request->no_of_rooms,
           'homestay_tag' => $request->homestay_tag,
           'selling_price' => $request->selling_price,
           'discount_price' => $request->discount_price,
           'available_from' => $request->available_from,
           'available_to' => $request->available_to,
           'short_desc' => $request->short_desc,
           'long_desc' => $request->long_desc,
           'homestay_thumbnail' => $filePath,
           'status' => 1,

           'created_at' => Carbon::now(),

       ]);

       /* Multiple Image Uploads */
       $multiImg = $request->file('homestay_images');
       foreach ($multiImg as $images){
           $multiImgName = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
           Image::make($images)->resize(800,900)->save('uploads/homestay/multiimage/' . $multiImgName);
           $uploadPath = 'uploads/homestay/multiimage/' . $multiImgName;

           HomestayImage::insert([
               'homestay_id' => $homestay_id,
               'photo_name' => $uploadPath,
               'created_at' => Carbon::now(),
           ]);
       }
       /*   Ends here           */
       $notification = array(
           'message' => 'Data Uploaded',
           'alert-type' => 'success'
       );
       return Redirect::route('all.homestay')->with($notification);
   }

   public function EditHomestayProducts($id)
   {
       $multiImage = HomestayImage::where('homestay_id', $id)->get();

       $homestay = Homestay::find($id);
       $category = Category::latest()->get();
       // $multiImage = MultiImg::find($id);
       return view('backend.products.homestay.homestay_edit', compact('homestay', 'multiImage',
           'category'));
   }

    public function UpdateHomestay(Request $request, $id){
        Homestay::find($id)->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'no_of_rooms' => $request->no_of_rooms,
                'homestay_tag' => $request->homestay_tag,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'available_from' => $request->available_from,
                'available_to' => $request->available_to,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'status' => 1,
                'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Data Uploaded',
            'alert-type' => 'success'
        );
        return Redirect::route('all.homestay')->with($notification);
    }

    public function DeleteHomestayImg($id){
        $oldImg = HomestayImage::find($id);
        unlink($oldImg->photo_name);

        HomestayImage::find($id)->delete();
        $notification = array(
            'message' => 'Image Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function UpdateHomestayMultiImage(Request $request, $id){
        $image = $request->homestay_img;

        foreach ($image as $id => $img){
            $imgDel = HomestayImage::find($id);
            unlink($imgDel->photo_name);

            $genName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(800,900)->save('uploads/homestay/multiimage/' . $genName);
            $ImgPath = 'uploads/homestay/multiimage/' . $genName;

            HomestayImage::where('id', $id)->update([
                'photo_name' => $ImgPath,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Homestay Image Updated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function UpdateHomestayThumbnail(Request $request, $id){
        $image = $request->homestay_thumbnail;
        $imgDel = Homestay::find($id);

        $genName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,900)->save('uploads/homestay/thumbnail/' . $genName);
        $ImgPath = 'uploads/homestay/thumbnail/' . $genName;

        unlink($imgDel->homestay_thumbnail);

        Homestay::find($id)->update([
            'homestay_thumbnail' => $ImgPath,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Homestay Thumbnail Updated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function InactiveHomestay($id){
        Homestay::find($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Homestay Inactivated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function ActiveHomestay($id){
        Homestay::find($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Homestay Activated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function DeleteHomestay($id){

        $homestay = Homestay::find($id);
        unlink($homestay->homestay_thumbnail);
        Homestay::find($id)->delete();

        $images = HomestayImage::where('homestay_id', $id)->get();
        foreach ($images as $img){
            unlink($img->photo_name);
            HomestayImage::where('homestay_id', $id)->delete();
        }
        $notification = array(
            'message' => 'Homestay Details Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }
}
