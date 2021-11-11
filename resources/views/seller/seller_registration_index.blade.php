@extends('frontend.main_master')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Seller Registration Form</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="col-12 create-new-account">
                    <h4 class="checkout-subtitle">Create a new account</h4>
                    <form method="POST" action="{{ route('register') }}" class="register-form outer-top-xs" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                    <input type="text" id="name" name="name" :value="old('name')" class="form-control unicase-form-control text-input">
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
                                    <input type="email" id="email" name="email" :value="old('email')" class="form-control unicase-form-control text-input">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                    <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input">
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
                                    <h5>Select Dzongkhag<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            <option value="5">
                                                Handicrafts </option>
                                            <option value="4">
                                                Agro Products </option>
                                            <option value="1">
                                                Homestay </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Select Gewog<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Sub-Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Select Village<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Sub-Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>What you want to Sell<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            <option value="5">
                                                Handicrafts </option>
                                            <option value="4">
                                                Agro Products </option>
                                            <option value="1">
                                                Homestay </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <h5>Remarks<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="short_desc" id="short_desc" class="form-control" required="" placeholder="Enter short description"></textarea>
                                </div>
                            </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Register</button>
                            </div>
                        </div>

                    </form>



                </div>
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection
