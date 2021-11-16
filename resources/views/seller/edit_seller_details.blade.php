@extends('admin.admin_master')

@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">

                <div class="col-12 create-new-account">
                    <div class="box-header with-border">
                        <h3 class="checkout-subtitle">Seller Details</h4>
                    </div><br>
                    <form method="POST" action="{{ route('store_seller') }}" class="register-form outer-top-xs" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                    <input type="text" id="name" name="name" value="{{$seller->name}}" class="form-control unicase-form-control text-input">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                    <input type="email" id="email" name="email" value="{{$seller->email}}" class="form-control unicase-form-control text-input">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone Number </label>
                                    <input type="text" id="phone" name="phone" value="{{$seller->phone}}"
                                           class="form-control unicase-form-control text-input">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Dzongkhag </label>
                                    <input type="text" id="phone" name="phone" value="{{$seller->dzongkhag->dzongkhag_name}}"
                                           class="form-control unicase-form-control text-input">
                                    @error('dzongkhag_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Gewog </label>
                                    <input type="text" id="phone" name="phone" value="{{$seller->gewog->gewog_name}}"
                                           class="form-control unicase-form-control text-input">
                                    @error('gewog_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Dzongkhag </label>
                                    <input type="text" id="phone" name="phone" value="{{$seller->village->village_name}}"
                                           class="form-control unicase-form-control text-input">
                                    @error('village_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Category:</label>
                                    <input type="text" readonly id="cat" name="cat" value="{{$cat}}" class="form-control unicase-form-control text-input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Remarks</h5>
                                    <div class="controls">
                                    <textarea name="remarks" id="remarks" class="form-control"
                                              required="" placeholder="Enter short description">
                                        {!! $seller->remarks !!}
                                    </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" onclick="updateform({{$seller->id}},'Approve')" class="btn-upper btn btn-primary"><span class="fa fa-check"></span>Aprove</button>
                                <button type="button" onclick="updateform({{$seller->id}},'Reject')" class="btn-upper btn btn-danger"><span class="fa fa-times"></span>Reject</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal fade" id="actionmodel" tabindex="-1" aria-labelledby="actionmodelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="actionmodelLabel"> <strong id="pname"></strong> </h5>
                                <button type="button" onclick="closemodal('actionmodel')" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('update_seller') }}" class="register-form outer-top-xs" role="form">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="recordId" id="recordId"/>
                                           <span>Are you suere you wish to <span id="actiontype"></span> this ? </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" onclick="updateform({{$seller->id}},'Approve')" class="btn-upper btn btn-primary btn-sm"><span class="fa fa-check"></span>Yes</button>
                                            <button type="button" onclick="closemodal('actionmodel')" data-dismiss="modal" class="btn-upper btn btn-danger btn-sm"><span class="fa fa-times"></span>No</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

    <script type="text/javascript">
        function updateform(id,type){
            $('#recordId').val(id);
            $('#actiontype').html(type);
            $('#actionmodel').modal('show');
        } 
        function closemodal(id){
            $('#'+id).modal('hide');    
        }
        $(document).ready(function() {
            $('select[name="dzongkhag_id"]').on('change', function(){
                var dzongkhag_id = $(this).val();
                if(dzongkhag_id) {
                    $.ajax({
                        url: "{{  url('/dzongkhag/gewog/ajax') }}/"+dzongkhag_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="gewog_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="gewog_id"]').append('<option value="'+ value.id +'">' + value.gewog_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            
        });
    </script>

    {{--VILLAGE AUTOLOAD--}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="gewog_id"]').on('change', function(){
                var gewog_id = $(this).val();
                if(gewog_id) {
                    $.ajax({
                        url: "{{  url('/dzongkhag/village/ajax') }}/"+gewog_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="village_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="village_id"]').append('<option value="'+ value.id +'">' + value.village_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    {{--END VILLAGE AUTOLOAD--}}

@endsection
