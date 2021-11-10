<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request  $request){
        $user=User::where('email',$request->email)->get();
        if($user!=null && $user!="" && sizeof($user)>0){
            foreach ($user as $us){
               if(Hash::check($request->password,$us->password)){
                   $userdet=$us;
                   $role=$Role::where('id',$us->role_id)->first();
                   $userdet->role=$role;
                   if(Session::get('Users')){

                   }
               }
            }
        }else{
            $message="This email is not recorded in our system";
        }
        dd(,$request->password);
    }
}
