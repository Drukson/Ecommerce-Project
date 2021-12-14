<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Dzongkhag;
use App\Models\Gewog;
use App\Models\MultiImg;
use App\Models\Seller;
use App\Models\User;
use App\Models\Role;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = User::find(Session::get('user_details')['user_id']);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function EditAdminProfile(){
        $editAdminProfile = User::find(Session::get('user_details')['user_id']);
        if ($editAdminProfile !=null && $editAdminProfile!=''){
            $seller_details = Seller::where('id', $editAdminProfile->seller_id)->first();
            $editAdminProfile->seller=$seller_details;
            // if($seller_details!=null && $seller_details!=""){
            //     $seller_dzongkhag = Dzongkhag::where('id', $seller_details->dzongkhag_id)->first();
            //     if($seller_dzongkhag!=null && $seller_dzongkhag!=""){
            //         $editAdminProfile->dzongkhag = $seller_dzongkhag;
            //     }
            //     $seller_gewog = Gewog::where('id', $seller_details->gewog_id)->first();
            //     if($seller_gewog!=null && $seller_gewog!=""){
            //         $editAdminProfile->gewog = $seller_gewog;
            //     }
            //     $seller_village = Village::where('id', $seller_details->village_id)->first();
            //     if($seller_village!=null && $seller_village!=""){
            //         $editAdminProfile->village = $seller_village;
            //     }
            // }

        }
        $dzongkhag=Dzongkhag::all();
        return view('admin.admin_profile_edit', compact('editAdminProfile','dzongkhag'));
    }

    public function AdminProfileStore(Request $request){
        $data = User::find(Session::get('user_details')['user_id']);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            unlink(public_path('uploads/admin_images/'. $data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images/'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        if($data->seller_id!=null && $data->seller_id!=""){
            $seller_data=[
                'name'              =>$request->name,
                'email'             =>$request->email,
                'phone'             =>$request->phone,
                'dzongkhag_id'      =>$request->dzongkhag_id,
                'gewog_id'          =>$request->gewog_id,
                'village_id'        =>$request->village_id,
            ];
            Seller::where('id',$data->seller_id)->update($seller_data);
        }
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect::route('update.profile')->with($notification);
    }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function AdminPasswordUpdate(Request $request) {

        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        // $hashedPassword = User::find(1)->password;
        $user_details = User::where('id',Session::get('user_details')['user_id'])->first();
        if (Hash::check($request->oldpassword, $user_details->password )){
            $user_details->password = Hash::make($request->password);
            $user_details->save();
            Auth::logout();
            Session::forget('user_details');
            Session::flush();
            return Redirect::route('admin.logout');
        }else{
            return Redirect::back();
        }
    }

    public function AllUsers(){
        $users = User::latest()->get();
        if($users!=null && $users!=""){
            foreach($users as $us){
                $role=Role::where('id',$us->role_id)->first();
                if($role!=null && $role!=""){
                    $us->role=$role->name;
                }
            }
        }
        return view('backend.user.all_user',compact('users'));
    }

    public function DeleteUsers($id){
        $deleteUser = User::find($id);
        $deleteUser->delete();

        $notification = array(
            'message' => 'User Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }



}
