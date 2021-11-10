<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function CategoryView(){

        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));
    }

    public function AddCategory(Request $request){
        $validate = $request->validate([
            'name' => 'required|unique:categories',
            'icon' => 'required'
        ]);

        Category::insert([
            'name' => $request->name,
            'slug' => strtolower(str_replace('','-',$request->name)),
            'icon' => $request->icon,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Added',
            'alert-type' => 'success'
        );
        return Redirect::route('all.category')->with($notification);
    }

    public function EditCategory($id){
        $category = Category::find($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function UpdateCategory(Request $request, $id){

        Category::find($id)->update([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ','-',$request->name)),
            'icon' => $request->icon,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Updated',
            'alert-type' => 'success'
        );
        return Redirect::route('all.category')->with($notification);
    }

    public function DeleteCategory($id)
    {

        $category = Category::find($id);
        $category->delete();

        $notification = array(
            'message' => 'Category Deleted',
            'alert-type' => 'success'
        );
        return Redirect::route('all.category')->with($notification);
    }

}
