<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function EditAdminProfile(){
        $editAdminProfile = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editAdminProfile'));
    }

    public function AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            unlink(public_path('uploads/admin_images/'. $data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images/'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
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

}
