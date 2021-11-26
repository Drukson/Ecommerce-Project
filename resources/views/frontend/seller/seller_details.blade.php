@extends('frontend.main_master')

@section('content')
@section('title')
    Seller Details
@endsection
<style>
    .checked {
        color: orange;
    }
</style>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="#">Agro</a></li>
               {{-- <li class='active'>{{$product->product_name}}</li>--}}
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">

                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class="head"><i class="icon fa fa-american-sign-language-interpreting"></i> Sellers</div>
                        <div class="sidebar-module-container">
                            <div class="sidebar-filter">
                                @include('frontend.common.seller_details')
                            </div>
                        </div>
                        <!-- /.megamenu-horizontal -->
                    </div>
                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                        <div class="sidebar-module-container">
                            <div class="sidebar-filter">
                                @include('frontend.common.category')
                            </div>
                        </div>
                        <!-- /.megamenu-horizontal -->
                    </div>

                <!-- =================== Product Tags ================= -->
                @include('frontend.common.product_tags')
                <!-- ==================== Product Tags: END ============== -->

                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
            <div class="container">
             <div class="box">
            <div class="box-body box-profile">
                @foreach($seller as $seller)
                <div class="row">
                <div class="col-12">
                    <div>
                        <p>Email :<span class="text-gray pl-10"> {{$seller->email}}</span> </p>
                        <p>Phone :<span class="text-gray pl-10"> {{$seller->phone}}</span></p>
                        <p>Dzongkhag :<span class="text-gray pl-10"> {{$seller->dzongkhag_name}}</span></p>
                        <p>Gewog: <span class="text-gray pl-10"> {{$seller->gewog_name}}</span></p>
                    </div>
                </div>
                    <a href="{{url('/subcategory/product/'. $seller->id . '/seller')}}">
                        <button type="button" class="btn btn-rounded btn-primary mb-5">View Products</button>
                    </a>

                @endforeach


            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->
    </div>


    <script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/echo.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

@endsection
