@extends('frontend.main_master')

@section('content')
    @php
        $id = \Illuminate\Support\Facades\Auth::user()->id;
        $user = \App\Models\User::find($id);
    @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><strong><span class="text-danger">Hello...</span> {{\Illuminate\Support\Facades\Auth::user()->name}}</strong>
                            Change Password</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('user.password.update')}}">
                            @csrf
                            <div class="form-group">
                                <h5>Old Password</h5>
                                <div class="controls">
                                    <input type="password" id="current_password" name="oldpassword" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>New Password</h5>
                                <div class="controls">
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Confirm Password</h5>
                                <div class="controls">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-danger mb-5" value="Update Password" >
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
