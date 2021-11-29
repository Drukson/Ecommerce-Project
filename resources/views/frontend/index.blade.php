@extends('frontend.main_master')

@section('content')

    @section('title')
       Home | Shine Online Shoping
    @endsection

    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <!-- ================================== TOP NAVIGATION ================================== -->
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
                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->

                    <!-- ============================================== PRODUCT TAGS ============================================== -->

                        @include('frontend.common.product_tags')

                    <!-- /.sidebar-widget -->
                    <!-- ============================================== PRODUCT TAGS : END ============================================== -->

                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <br><br>
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                        <h3 class="section-title">Newsletters</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Sign Up for Our Newsletter!</p>
                            <form>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->
                </div>
                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            @foreach($slider as $slides)
                            <div class="item" style="background-image: url( {{asset($slides->slider_image)}});">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">

                                        <div class="big-text fadeInDown-1"> {{ $slides->title}}</div>
                                        <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slides->description}}</span> </div>
                                        <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>@endforeach
                                <!-- /.item -->
                        </div>
                        <!-- /.owl-carousel -->
                    </div>

                    <!-- ========================================= SECTION – HERO : END ========================================= -->

                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over $99</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->

                    </div>
                    <!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">New Products</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>

                                @foreach($category as $cat)
                                <li><a data-transition-type="backSlide" href="#category{{$cat->id}}" data-toggle="tab">
                                    {{$cat->name}}</a></li>
                                @endforeach

                            </ul>
                            <!-- /.nav-tabs -->
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                        @foreach($agroProduct as $agro)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{url('/product/agro/details/'. $agro->id.'/'. $agro->product_slug)}}"><img  src="{{asset($agro->product_thumbnail)}}" alt=""></a> </div>
                                                            <!-- /.image -->
                                                            @php
                                                            $amount = $agro->selling_price - $agro->discount_price;
                                                            $discount = ($amount/$agro->selling_price) * 100;
                                                            @endphp
                                                            @if($agro->discount_price == NULL )
                                                                <div class="tag new"><span>New</span></div>
                                                            @else
                                                                <div class="tag hot"><span>{{round($discount)}} %</span></div>
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{url('/product/agro/details/'. $agro->id.'/'. $agro->product_slug)}}">{{$agro->product_name}} </a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            @if($agro->discount_price == NULL)
                                                                <div class="product-price"> <span class="price">Nu. {{$agro->selling_price}} </span></div>
                                                            @else
                                                                <div class="product-price"> <span class="price">Nu. {{$agro->discount_price}} </span>
                                                                <span class="price-before-discount">Nu. {{$agro->selling_price}}</span> </div>
                                                            @endif
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon"  type="button" title="Add to cart"
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModal" id="{{ $agro->id }}"
                                                                                onclick="productView(this.id)">
                                                                            <i class="fa fa-shopping-cart"></i> </button>
                                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                    </li>
                                                                    {{--<li --}}{{--class="lnk wishlist"--}}{{-->
                                                                        <button class="btn btn-primary icon"  type="button" title="Wishlist"
                                                                                id="{{ $agro->id }}" onclick="addToWishlist(this.id)">
                                                                            <i class="fa fa-heart"></i>
                                                                        </button>
                                                                    </li>--}}
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                        @endforeach
                                        <!-- /.item -->
                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->

                            @foreach($category as $cat)
                            <div class="tab-pane" id="category{{$cat->id}}">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @php
                                    $catdata = \App\Models\AgroProduct::where('category_id', $cat->id)->orderBy('id','DESC')->get();
                                    @endphp

                                        @forelse($catdata as $agro)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{url('/product/agro/details/'. $agro->id.'/'. $agro->product_slug)}}">
                                                                    <img  src="{{asset($agro->product_thumbnail)}}" alt=""></a> </div>
                                                            <!-- /.image -->

                                                            @php
                                                                $amount = $agro->selling_price - $agro->discount_price;
                                                                $discount = ($amount/$agro->selling_price) * 100;
                                                            @endphp
                                                            @if($agro->discount_price == NULL)
                                                                <div class="tag new"><span>New</span></div>
                                                            @else
                                                                <div class="tag hot"><span>{{round($discount)}} %</span></div>
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{url('/product/agro/details/'. $agro->id.'/'. $agro->product_slug)}}">{{$agro->product_name}} </a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            @if($agro->discount_price == NULL)
                                                                <div class="product-price"> <span class="price">Nu. {{$agro->selling_price}} </span></div>
                                                            @else
                                                              <div class="product-price"> <span class="price">Nu. {{$agro->discount_price}} </span>
                                                                <span class="price-before-discount">{{$agro->selling_price}}</span>
                                                              </div>
                                                            @endif
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon"  type="button" title="Add to cart"
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModal" id="{{ $agro->id }}"
                                                                                onclick="productView(this.id)">
                                                                            <i class="fa fa-shopping-cart"></i> </button>
                                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                    </li>
                                                                    {{--<li --}}{{--class="lnk wishlist"--}}{{-->
                                                                        <button class="btn btn-primary icon"  type="button" title="Wishlist"
                                                                                id="{{ $agro->id }}" onclick="addToWishlist(this.id)">
                                                                            <i class="fa fa-heart"></i>
                                                                        </button>
                                                                    </li>--}}
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                    @empty
                                            <h4 class="text-danger">No Products Found</h4>
                                    @endforelse
                                    <!-- /.item -->
                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            @endforeach
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.scroll-tabs -->

                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    {{--<section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Featured products</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @foreach($featured as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{url('/product/agro/details/'. $product->id.'/'. $product->product_slug)}}"><img  src="{{$product->product_thumbnail}}" alt=""></a> </div>
                                            <!-- /.image -->
                                            <div class="tag hot"><span>hot</span></div>
                                        </div>
                                        <!-- /.product-image -->
                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{url('/product/agro/details/'. $product->id.'/'. $product->product_slug)}}">{{$product->product_name}}</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            @if($product->discount_price == NULL)
                                                <div class="product-price">
                                                    <span class="price">Nu. {{$product->selling_price}} </span>
                                                </div>
                                            @else
                                                <div class="product-price">
                                                    <span class="price">Nu. {{ $product->discount_price}} </span>
                                                    <span class="price-before-discount">Nu. {{$product->selling_price }}</span>
                                                </div>
                                        @endif
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon"  type="button" title="Add to cart"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal" id="{{ $product->id }}"
                                                                onclick="productView(this.id)">
                                                            <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                    </li>
                                                    <li --}}{{--class="lnk wishlist"--}}{{-->
                                                        <button class="btn btn-primary icon"  type="button" title="Wishlist"
                                                                id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                            <i class="fa fa-heart"></i>
                                                        </button>

                                                        --}}{{-- <button class="btn btn-primary icon"  type="button"  title="Wishlist"
                                                                 id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                             <i class="fa fa-heart"></i>
                                                         </button>--}}{{--
                                                    </li>

                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                        <!-- /.product -->
                                </div>
                                <!-- /.products -->
                            </div>
                            @endforeach
                            <!-- /.item -->

                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>--}}
                    <!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                    <!-- ============================================== HOMESTAY PRODUCTS ============================================== -->
                    @foreach($category_list as $cat)
                        <section class="section featured-product wow fadeInUp">
                            <h3 class="section-title">{{$cat->name}}</h3>
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                                @foreach($cat->product_details as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{url('/product/agro/details/'. $product->id.'/'. $product->product_slug)}}"><img  src="{{$product->product_thumbnail}}" alt=""></a> </div>
                                                    <!-- /.image -->
                                                </div>
                                                <!-- /.product-image -->
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{url('/product/agro/details/'. $product->id.'/'. $agro->slug)}}">{{$product->product_name}}</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price"> <span class="price"> Nu. {{ $product->selling_price }}</span>
                                                        <span class="price-before-discount">Nu. {{ $product->discount_price }}</span> </div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon"  type="button" title="Add to cart"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal" id="{{ $agro->id }}"
                                                                        onclick="productView(this.id)">
                                                                    <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                            </li>
                                                            {{--<li --}}{{--class="lnk wishlist"--}}{{-->
                                                                <button class="btn btn-primary icon"  type="button" title="Wishlist"
                                                                        id="{{ $agro->id }}" onclick="addToWishlist(this.id)">
                                                                    <i class="fa fa-heart"></i>
                                                                </button>
                                                            </li>--}}
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                            @endforeach
                            <!-- /.item -->

                            </div>
                            <!-- /.home-owl-carousel -->
                        </section>
                    @endforeach


                </div>
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
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
