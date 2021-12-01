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
                                                <input type="text" name="name" class="form-control" value="{{$editAdminProfile->name}}" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                            <div class="form-control-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Email Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{$editAdminProfile->email}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Phone <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="phone" class="form-control" value="{{$editAdminProfile->phone}}" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                            <div class="form-control-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Dzongkhag <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="dzongkhag_id" onchange="getgeowg('dzongkhag_id')" id="dzongkhag_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Dzongkhag</option>
                                                    @foreach($dzongkhag as $data)
                                                        <option value="{{$data->id}}">{{$data->dzongkhag_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('dzongkhag_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                {{-- <input type="text" name="dzongkhag_id" value="{{$editAdminProfile->dzongkhag->dzongkhag_name}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Gewog <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gewog_id" onchange="getvillage('gewog_id')" id="gewog_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Gewog</option>
                                                </select>
                                                @error('gewog_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                {{-- <input type="text" name="gewog_id" value="{{$editAdminProfile->gewog->gewog_name}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Village <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="village_id" id="village_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Village</option>
                                                </select>
                                                {{-- <input type="text" name="village" value="{{$editAdminProfile->village->village_name}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    if(isset($editAdminProfile->seller)){
                                @endphp
                                <script>
                                    if('{{$editAdminProfile->seller->dzongkhag_id}}'!=null && '{{$editAdminProfile->seller->dzongkhag_id}}'!=''){
                                        $('#dzongkhag_id').val('{{$editAdminProfile->seller->dzongkhag_id}}');
                                    }
                                    getgeowg('{{$editAdminProfile->seller->dzongkhag_id}}','{{$editAdminProfile->seller->gewog_id}}');
                                    getvillage('{{$editAdminProfile->seller->dzongkhag_id}}','{{$editAdminProfile->seller->gewog_id}}');
                                </script>
                                @php
                                    }
                                @endphp
                                <script>
                                    function getgeowg(dzoId,gewogId){
                                        if(dzoId=="dzongkhag_id"){
                                            dzoId=$('#dzongkhag_id').val();
                                        }
                                        $.ajax({
                                            url: "{{  url('/dzongkhag/gewog/ajax') }}/"+dzoId,
                                            type:"GET",
                                            dataType:"json",
                                            success:function(data) {
                                                var d =$('select[name="gewog_id"]').empty();
                                                $('select[name="gewog_id"]').append('<option value="" selected="" disabled="">Select gewog</option>');
                                                $.each(data, function(key, value){
                                                    $('select[name="gewog_id"]').append('<option value="'+ value.id +'">' + value.gewog_name + '</option>');
                                                });
                                                if(gewogId!=null && gewogId!=undefined && gewogId!=""){
                                                    $('#gewog_id').val(gewogId);
                                                }
                                            },
                                        });
                                    }

                                    function getvillage(gewog_id,village_id){
                                        if(gewog_id=="gewog_id"){
                                            gewog_id=$('#gewog_id').val();
                                        }
                                        $.ajax({
                                            url: "{{  url('/dzongkhag/village/ajax') }}/"+gewog_id,
                                            type:"GET",
                                            dataType:"json",
                                            success:function(data) {
                                                var d =$('select[name="village_id"]').empty();
                                                $('select[name="village_id"]').append('<option value="" selected="" disabled="">Select Village</option>');
                                                $.each(data, function(key, value){
                                                    $('select[name="village_id"]').append('<option value="'+ value.id +'">' + value.village_name + '</option>');
                                                });
                                                if(village_id!=null && village_id!=undefined && village_id!=""){
                                                    $('#village_id').val(village_id);
                                                }
                                            },
                                        });
                                    }
                                </script>
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
