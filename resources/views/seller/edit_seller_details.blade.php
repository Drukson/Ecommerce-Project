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
                                    <h5>Category<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach($category as $details)
                                                <option value="{{$details->id}}"
                                                    {{$details->id == $subcategory->category_id ? 'selected':''}}>
                                                    {{$details->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
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
                            <div class="col-md-4">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update Sellers</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->





    <script type="text/javascript">
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
