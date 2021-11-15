@extends('frontend.main_master')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
              <img class="card-img-top" style="border-radius: 50%" src="{{(!empty($user->profile_photo_path))
                ? url('uploads/user_images/'.$user->profile_photo_path ) : url('uploads/no_image.png')}}" height="100%" width="100%"><br><br>
            <ul class="list-group list-group-flush">
                <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Update Profile</a>
                <a href="{{route('user.password.change')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                <a href="{{route('my.orders')}}" class="btn btn-primary btn-sm btn-block">My Orders</a>
                <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
            </ul>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><strong><span class="text-danger">Hello...</span> {{\Illuminate\Support\Facades\Auth::user()->name}}</strong>
                    Welcome to Easy Online Shop</h3>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
