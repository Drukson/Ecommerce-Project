<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Support\Facades\Session;
use App\Models\AgroProduct;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Image;

class AgroProductController extends Controller
{
    public function AgroView(){
        $seller_id=Session::get('user_details')['seller_id'];
        $seller=Seller::where('id',$seller_id)->first();
        $cat_ids=[];
        if($seller!=null && $seller!=""){
            $cat=explode(', ',rtrim($seller->category_id,', '));
            foreach($cat as $cat){
                array_push($cat_ids,$cat);
            }
        }
        
        $category = Category::wherein('id',$cat_ids)->get();
        // $category_skip = Category::skip(1)->first();
        $subcategory = SubCategory::latest()->get();
        return view('backend.products.agro.agro_add', compact('category', 'subcategory'));
    }

    public function AddAgroProduct(Request $request){
        $img = $request->file('product_thumbnail');
        $imgName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,900)->save('uploads/products/thumbnail/' . $imgName);
        $filePath = 'uploads/products/thumbnail/' . $imgName;
       $product_id = AgroProduct::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tag' => $request->	product_tag,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'hot_deals' => $request->hot_deals,
            'featured_deals' => $request->featured_deals,
            'special_offers' => $request->special_offers,
            'special_deals' => $request->special_deals,
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,

            'product_thumbnail' => $filePath,
            'status' => 1,
            'product_unit' => $request->product_unit,
            'created_by' => Session::get('user_details')['user_id'],
            'seller_id' => Session::get('user_details')['seller_id'],
            'created_at' => Carbon::now(),
        ]);

       /* Multiple Image Uploads */
        $multiImg = $request->file('multi_img');
        foreach ($multiImg as $images){
            $multiImgName = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
            Image::make($images)->resize(800,900)->save('uploads/products/multiimage/' . $multiImgName);
            $uploadPath = 'uploads/products/multiimage/' . $multiImgName;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        /*   Ends here           */
        $notification = array(
            'message' => 'Data Uploaded',
            'alert-type' => 'success'
        );
        return Redirect::route('manage.agroproducts')->with($notification);
    }

    public function ManageAgroProducts(){
        $agroProducts = AgroProduct::latest()->get();
        return view('backend.products.agro.agro_products_view', compact('agroProducts'));
    }

    public function EditAgroProducts($id){

        $multiImage = MultiImg::where('product_id', $id)->get();

        $agroProduct = AgroProduct::find($id);
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
       // $multiImage = MultiImg::find($id);
        return view('backend.products.agro.agro_products_edit', compact('agroProduct', 'multiImage',
            'category', 'subcategory'));
    }

    public function UpdateAgroProducts(Request $request, $id){
        AgroProduct::find($id)->update([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tag' => $request->	product_tag,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'hot_deals' => $request->hot_deals,
            'featured_deals' => $request->featured_deals,
            'special_offers' => $request->special_offers,
            'special_deals' => $request->special_deals,

            'available_from' => $request->available_from,
            'available_to' => $request->available_to,

            'status' => 1,
            'product_unit' => $request->product_unit,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated without Image',
            'alert-type' => 'success'
        );
        return Redirect::route('manage.agroproducts')->with($notification);
    }

    public function UpdateAgroMultiImage(Request $request, $id){
        $image = $request->multi_img;

        foreach ($image as $id => $img){
            $imgDel = MultiImg::find($id);
            unlink($imgDel->photo_name);

            $genName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(800,900)->save('uploads/products/multiimage/' . $genName);
            $ImgPath = 'uploads/products/multiimage/' . $genName;

            MultiImg::where('id', $id)->update([
                'photo_name' => $ImgPath,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Image Updated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function UpdateAgroThumbnail(Request $request, $id){
        $image = $request->product_thumbnail;
        $imgDel = AgroProduct::find($id);

            $genName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(800,900)->save('uploads/products/thumbnail/' . $genName);
            $ImgPath = 'uploads/products/thumbnail/' . $genName;

            unlink($imgDel->product_thumbnail);

            AgroProduct::find($id)->update([
                'product_thumbnail' => $ImgPath,
                'updated_at' => Carbon::now(),
            ]);

        $notification = array(
            'message' => 'Product Thumbnail Updated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function DeleteAgroProductImg($id){
        $oldImg = MultiImg::find($id);
        unlink($oldImg->photo_name);

        MultiImg::find($id)->delete();
        $notification = array(
            'message' => 'Image Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function InactiveAgroProduct($id){
        AgroProduct::find($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactivated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function ActiveAgroProduct($id){
        AgroProduct::find($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Activated',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function DeleteAgroProduct($id){

        $product = AgroProduct::find($id);
        unlink($product->product_thumbnail);
        AgroProduct::find($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img){
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }
        $notification = array(
            'message' => 'Product Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    // product Stock
    public function ProductStock()
    {
        $products = AgroProduct::latest()->get();
        return view('backend.products.agro.product_stock',compact('products'));
    }

}
