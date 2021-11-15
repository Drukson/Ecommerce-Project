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
                @include('frontend.common.user_sidebar')
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
