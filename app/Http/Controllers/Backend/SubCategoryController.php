<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){

        $subcategory = SubCategory::latest()->get();
        $category = Category::orderBy('name', 'ASC')->get();
        return view('backend.category.subcategory_view', compact('subcategory', 'category'));
    }

    public function AddSubCategory(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => strtolower(str_replace('','-',$request->name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Sub Category Added',
            'alert-type' => 'success'
        );
        return Redirect::route('all.subcategory')->with($notification);
    }

    public function EditSubCategory($id){
        $subcategory = SubCategory::find($id);
        $category = Category::orderBy('name', 'ASC')->get();
        return view('backend.category.subcategory_edit', compact('subcategory', 'category'));
    }

    public function UpdateSubCategory(Request $request, $id){
        $validate = $request->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        SubCategory::find($id)->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => strtolower(str_replace('','-',$request->name)),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Sub Category Added',
            'alert-type' => 'success'
        );
        return Redirect::route('all.subcategory')->with($notification);
    }

    public function DeleteSubCategory($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        $notification = array(
            'message' => 'Category Deleted',
            'alert-type' => 'success'
        );
        return Redirect::route('all.subcategory')->with($notification);
    }

    /*// Sub Sub Category
    public function SubSubCategoryView(){
        $category = Category::orderBy('name', 'ASC')->get();
        $subcategory = SubCategory::orderBy('name', 'ASC')->get();
        $subsubcat = SubSubCategory::latest()->get();
        return view('backend.category.subsubcategory_view',
            compact('category', 'subsubcat', 'subcategory'));
    }

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('name','ASC')->get();
        return json_encode($subcat);
    }

    public function AddSubSubCategory(Request $request){

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Sub Category Added',
            'alert-type' => 'success'
        );
        return Redirect::route('all.subsubcategory')->with($notification);
    }

    public function EditSubSubCategory($id){
        $subsubcat = SubSubCategory::find($id);
        $category = Category::orderBy('name', 'ASC')->get();
        $subcategory = SubCategory::orderBy('name', 'ASC')->get();
        return view('backend.category.subsubcategory_edit',
            compact('subsubcat', 'subcategory','category'));
    }

    public function UpdateSubSubCategory(Request $request, $id){

        SubSubCategory::find($id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Sub Category Updated',
            'alert-type' => 'success'
        );
        return Redirect::route('all.subsubcategory')->with($notification);
    }
    public function DeleteSubSubCategory($id)
    {
        $subcategory = SubSubCategory::find($id);
        $subcategory->delete();

        $notification = array(
            'message' => 'Sub SubCategory Deleted',
            'alert-type' => 'success'
        );
        return Redirect::route('all.subsubcategory')->with($notification);
    }*/

}
