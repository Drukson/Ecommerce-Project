<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller{
    public function user_login(Request  $request){
        $validate = $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);
        $user=User::where('email',$request->email)->get();
        if($user!=null && $user!="" && sizeof($user)>0){
            $usermatch=false;
            foreach ($user as $us){
               if(Hash::check($request->password,$us->password)!==false){
                    $role=Role::where('id',$us->role_id)->first();
                    $userdet=[
                        'user_id'   =>$us->id,
                        'name'     =>$us->name,
                        'phone'     =>$us->phone,
                        'email'     =>$us->email,
                        'role_id'   =>$role->id,
                        'role_name' =>$role->name,
                    ];
                    Session::put('user_details',$userdet);
                    $usermatch=true;
                    break;
                }
            }
            if($usermatch){ 
                return redirect()->route('public_dashboard');
            }else{
                $message="User name and password mismatch. Please check your password and try again";
            }
        }else{
            $message="This email (".$request->email.") is not recorded in our system. Please check your email and try again";
        }
        return view('auth.login',compact('message'));
    }

    public function public_dashboard(){
        if(Session::get('user_details')!=null){
            if(strpos(strtolower(Session::get('user_details')['role_name']),'customer')!==false){
                return view('dashboard');
            }else{
                return view('admin/index');   
            }
        }else{
            return redirect()->route('login');
        }
    }
    public function public_logout(){
        Session::forget('user_details');
        Session::flush();
        return redirect()->route('/');
    }
    public function register_customer(Request $request){
        $roleid=Role::where('name','Customer')->first();
        $checkuser=User::where('email',$request->email)->where('role_id',$roleid->id)->first();
        if($checkuser!=null && $checkuser!=""){
            $notification = array(
                'message' => 'Not albe to register.Please try again',
                'alert-type' => 'danger'
            );
            $message="Not albe to register.Please try again.";
        }else{
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role_id' => $roleid->id,
                'status' => 1,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Your registration is sucess. You may login now to access further with us',
                'alert-type' => 'success'
            );
            $message="Your registration is sucess. You may login now to access further with us.";
        }
        return view('seller.registration_acknowledgement',compact('message'))->with($notification);
        
    }
} 
