@extends('frontend.main_master')

@section('content')
@section('title')
{{$product->product_name}} Product Details
@endsection
<style>
    .checked {
        color: orange;
    }
</style>
    {{--<div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="#">Agro</a></li>
                    <li class='active'>{{$product->product_name}}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->--}}
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

                        <div class="side-menu animate-dropdown outer-bottom-xs">
                            <div class="head"><i class="icon fa fa-tag"></i> Product Tags</div>
                            <div class="sidebar-module-container">
                                <div class="sidebar-filter">
                                    @include('frontend.common.product_tags')
                                </div>
                            </div>
                            <!-- /.megamenu-horizontal -->
                        </div>

                        <!-- ============================================== NEWSLETTER ============================================== -->
                        @include('frontend.common.subscription')
                        <!-- ============================================== NEWSLETTER: END ============================================== -->

                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                        @foreach($multiImg as $multi)
                                        <div class="single-product-gallery-item" id="slide{{$multi->id}}">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{asset($multi->photo_name)}}">
                                                <img class="img-responsive" alt="" src="{{asset($multi->photo_name)}}"
                                                     data-echo="{{asset($multi->photo_name)}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @endforeach

                                    </div><!-- /.single-product-slider -->
                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            @foreach($multiImg as $multi)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$multi->id}}">
                                                    <img class="img-responsive" width="85" alt="" src="{{asset($multi->photo_name)}}"
                                                         data-echo="{{asset($multi->photo_name)}}" />
                                                </a>
                                            </div>
                                            @endforeach

                                        </div><!-- /#owl-single-product-thumbnails -->

                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->

                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name" id="pname">{{$product->product_name}}</h1>

                                    {{--<div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                @if($avarage == 0)
                                                    No Rating Yet
                                                @elseif($avarage == 1 || $avarage < 2)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 2 || $avarage < 3)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 3 || $avarage < 4)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>

                                                @elseif($avarage == 4 || $avarage < 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 5 || $avarage < 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                @endif
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">({{ count($reviewcount) }} Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->--}}
                                    @if($product->category_id == 5 || $product->category_id == 4)
                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    @if($product->product_qty > 0)
                                                    <span class="value">{{$product->product_qty}} Packets/Pieces</span>
                                                    @else
                                                        <span class="value">Out of Stock</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->
                                    @endif

                                    {{--HOMESTAY DETAILS--}}
                                    @if($product->category_id == 1)
                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                Available From: <button type="button" class="btn btn-rounded btn-info mb-5">
                                                    {{$product->available_from}}</button>
                                            </div>
                                            <br><br>
                                            <div class="col-sm-9">
                                                Available To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-rounded btn-info mb-5">
                                                    {{$product->available_to}}</button>
                                            </div>
                                            <br><br>
                                            <div class="col-sm-9">
                                                Total Rooms: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-rounded btn-info mb-5">
                                                    {{$product->product_qty}}</button>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.END HOMESTAY-->
                                    @endif

                                    <div class="description-container m-t-20">
                                        {{$product->short_desc}}
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    <span class="price">Nu. {{$product->selling_price}}</span>
                                                    {{--@if($product->discount_price == NULL)
                                                    <span class="price">Nu. {{$product->selling_price}}</span>
                                                    @else
                                                     <span class="price">Nu. {{$product->discount_price}}</span>
                                                    <span class="price-strike">Nu. {{$product->selling_price}}</span>
                                                        @endif--}}
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    @if($product->category_id == 2)
                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="form-group">
                                                                <label for="qty">Quantity</label>
                                                                <input type="number" class="form-control" value="1" min="1" id="qty" placeholder="Example input placeholder">
                                                            </div>
                                                        </div>
                                                        {{--<input type="text" value="1" min="1" id="qty">--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="product_id" value="{{$product->id}}" min="1">
                                            <div class="col-sm-7">
                                                <button type="submit" onclick="addToCart()" class="btn btn-primary" ><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->
                                @endif
                                   @php
                                    $seller = \App\Models\User::where('role_id', 1)->get();
                                   @endphp
                                    <h5>Seller: {{$product->seller_details!=null && $product->seller_details!="" ? $product->seller_details->name : ''}}</h5>
                                    <h5>Phone: {{$product->seller_details!=null && $product->seller_details!="" ? $product->seller_details->phone: ''}}</h5>
                                    <h5>Location: {{$product->seller_details!=null && $product->seller_details!="" ? $product->seller_details->dzongkhag->dzongkhag_name :''}}</h5>
                                    @if($product->seller_details!=null && $product->seller_details!="")


                                    @php

                                        $reviewcount = App\Models\Review::where('seller_id',$product->seller_details->id)->where('status',1)->latest()->get();
                                        $avarage = App\Models\Review::where('seller_id',$product->seller_details->id)->where('status',1)->avg('rating');

                                    @endphp

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                @if($avarage == 0)
                                                    No Rating Yet
                                                @elseif($avarage == 1 || $avarage < 2)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 2 || $avarage < 3)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 3 || $avarage < 4)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>

                                                @elseif($avarage == 4 || $avarage < 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 5 || $avarage < 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                @endif
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a data-toggle="tab" onclick="showreview1()" href="#review">({{ count($reviewcount) }} Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><br><!-- /.rating-reviews -->
                                    @endif
                                    <a data-toggle="tab" onclick="showreview()" href="#review"><button type="button" class="btn btn-dark mb-5">Review Seller</button></a>


                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li id="descbtn" class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li id="reviewbtn"><a data-toggle="tab"  href="#review">REVIEW</a></li>

                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">
                                <div class="tab-content">
                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">{!! $product->long_desc !!} </p>
                                        </div>
                                    </div><!-- /.tab-pane -->
                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">
                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>
                                                @if($product->seller_details!=null && $product->seller_details!="")

                                                    @php
                                                        $reviews = App\Models\Review::where('seller_id',$product->seller_details->id)->where('status',1)->latest()->get();

                                                    @endphp

                                                <div class="reviews">

                                                    @foreach($reviews as $item)
                                                        @if($item->status == 0)

                                                        @else
                                                            <div class="review">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <img style="border-radius: 50%" src="{{ (!empty($item->user->profile_photo_path))? url('uploads/user_images/'.$item->user->profile_photo_path):url('uploads/no_image.jpg') }}" width="40px;" height="40px;"><b> {{ $item->user->name }}</b>
                                                                        @if($item->rating == NULL)

                                                                        @elseif($item->rating == 1)
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        @elseif($item->rating == 2)
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>

                                                                        @elseif($item->rating == 3)
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>

                                                                        @elseif($item->rating == 4)
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        @elseif($item->rating == 5)
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>

                                                                        @endif

                                                                    </div>
                                                                    <div class="col-md-6">

                                                                    </div>
                                                                </div> <!-- // end row -->
                                                                <div class="review-title"><span class="summary">{{ $item->summary }}</span><span class="date"><i class="fa fa-calendar"></i><span> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span></span></div>
                                                                <div class="text">"{{ $item->comment }}"</div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div><!-- /.reviews -->
                                                @endif
                                            </div><!-- /.product-reviews -->
                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-form">
                                                        @if(Session::get('user_details')!== null && Session::get('user_details')!=='')
                                                        <div class="form-container">
                                                        <form role="form" class="cnt-form" method="post" action="{{ route('review.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <input type="hidden" name="seller_id" value="{{$product->seller_details->id}}">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th class="cell-label">&nbsp;</th>
                                                                    <th>1 star</th>
                                                                    <th>2 stars</th>
                                                                    <th>3 stars</th>
                                                                    <th>4 stars</th>
                                                                    <th>5 stars</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="cell-label">Quality</td>
                                                                    <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                                </tr>

                                                                </tbody>
                                                            </table>

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                        <input type="text" name="summary" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->
                                                            <div class="action text-right">
                                                                <button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div><!-- /.action -->
                                                        </form><!-- /.cnt-form -->
                                                        </div><!-- /.form-container -->
                                                    @else
                                                        <p> <b> To Add Product Review, You Need to Login First <a href="{{ route('login') }}">Login Here</a> </b> </p>
                                                    @endif

                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">similar products</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            @foreach($product->related_productlist as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{url('/product/agro/details/'. $product->id.'/'. $product->product_slug)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
                                            </div><!-- /.image -->

                                            {{--<div class="tag sale"><span>sale</span></div>--}}
                                        </div><!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="#">{{$product->product_name}}</a></h3>
                                            {{--<div class="rating rateit-small"></div>--}}
                                            <div class="description">{!! Str::words("$product->short_desc", 15, ' ...') !!}</div>

                                            <div class="product-price">
				                                <span class="price">
					                                Nu. {{$product->selling_price}}
                                                </span>

                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">

                                            @if($product->category_id == 2)
                                                {{--<div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->--}}
                                            @endif
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div>
                            @endforeach


                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

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

        <script type="text/javascript">
            function showreview(){
                $('#descbtn').removeClass('active');
                $('#reviewbtn').addClass('active');
            }
        </script>

        <script type="text/javascript">
            function showreview1(){
                $('#descbtn').removeClass('active');
                $('#reviewbtn').addClass('active');
            }
        </script>

@endsection
