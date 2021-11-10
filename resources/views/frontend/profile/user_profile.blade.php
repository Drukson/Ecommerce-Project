@extends('frontend.main_master')

@section('content')
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
                            Update Your Profile</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <h5>Name</h5>
                                <div class="controls">
                                    <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Email</h5>
                                <div class="controls">
                                    <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Phone</h5>
                                <div class="controls">
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Choose Profile Picture </h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" id="image" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img id="showImage" src="{{ (!empty($editAdminProfile->profile_photo_path)) ?
                                        url('uploads/admin_images/'.$editAdminProfile->profile_photo_path) : url('uploads/no_image.png') }}" style="width: 100px">
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Profile" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
