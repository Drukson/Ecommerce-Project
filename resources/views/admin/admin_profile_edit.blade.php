@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Edit Profile</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form action="{{route('admin.profile.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Full Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value="{{Session::get('user_details')['name']}}" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                            <div class="form-control-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Email Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{Session::get('user_details')['email']}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>File Input Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="profile_photo_path" id="image" class="form-control" ></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <img id="showImage" src="{{ (!empty($editAdminProfile->profile_photo_path)) ?
                                        url('uploads/admin_images/'.$editAdminProfile->profile_photo_path) : url('uploads/no_image.png') }}" style="width: 100px">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Profile" >
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>

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
