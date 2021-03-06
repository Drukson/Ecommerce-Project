@extends('frontend.main_master')
@section('content')
@section('title')
    Product Search Page
@endsection

{{--<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Handbags</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>--}}
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-3 sidebar'>

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
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Product Tags</div>
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            @include('frontend.common.product_tags')
                        </div>
                    </div>
                    <!-- /.megamenu-horizontal -->
                </div>

                <!-- ========================= NEWSLETTER ================================= -->
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="fa fa-newspaper-o"></i> NEWSLETTERS</div>
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            @include('frontend.common.subscription')
                        </div>
                    </div>
                    <!-- /.megamenu-horizontal -->
                </div>

                <!-- ================================= NEWSLETTER: END ========================= -->

                <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>

                <!-- == ==== SECTION ??? HERO === ====== -->
                {{--SLIDER--}}
                @include('frontend.common.slider')
                <br>
                {{--ENDSLIDER--}}


                <!--    //////////////////// START Product Grid View  ////////////// -->

                {{--<div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{ url('product/agro/details/'.$product->id.'/'.$product->product_slug ) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                                                        <!-- /.image -->
                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ($amount/$product->selling_price) * 100;
                                                        @endphp

                                                        <div>
                                                            @if ($product->discount_price == NULL)
                                                                <div class="tag new"><span>new</span></div>
                                                            @else
                                                                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{ url('product/agro/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                               {{ $product->product_name }} </a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>

                                                        @if ($product->discount_price == NULL)
                                                            <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>   </div>
                                                        @else
                                                            <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
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
                                                                --}}{{--<li --}}{{----}}{{--class="lnk wishlist"--}}{{----}}{{-->
                                                                    <button class="btn btn-primary icon"  type="button" title="Wishlist"
                                                                            id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                                        <i class="fa fa-heart"></i>
                                                                    </button>
                                                                    --}}{{----}}{{-- <button class="btn btn-primary icon"  type="button"  title="Wishlist"
                                                                             id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                                         <i class="fa fa-heart"></i>
                                                                     </button>--}}{{----}}{{--
                                                                </li>--}}{{--
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
                                        <!-- /.item -->
                                    @endforeach

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->

                        </div>
                        <!-- /.tab-pane -->

                        <!--            //////////////////// END Product Grid View  ////////////// -->


                        <!--            //////////////////// Product List View Start ////////////// -->

                        --}}{{--<div class="tab-pane "  id="list-container">
                            <div class="category-product">

                                @foreach($products as $product)
                                    <div class="category-product-inner wow fadeInUp">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image"> <img src="{{ asset($product->product_thumbnail) }}" alt=""> </div>
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                                                                    {{ $product->product_name }}</a></h3>
                                                            <div class="rating rateit-small"></div>

                                                            @if ($product->discount_price == NULL)
                                                                <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                                                            @else
                                                                <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                                                        @endif

                                                        <!-- /.product-price -->
                                                            <div class="description m-t-10">
                                                                {{ $product->short_desc }}</div>
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
                                                                        --}}{{----}}{{--<li --}}{{----}}{{----}}{{----}}{{--class="lnk wishlist"--}}{{----}}{{----}}{{----}}{{-->
                                                                            <button class="btn btn-primary icon"  type="button" title="Wishlist"
                                                                                    id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                                                <i class="fa fa-heart"></i>
                                                                            </button>

                                                                            --}}{{----}}{{----}}{{----}}{{-- <button class="btn btn-primary icon"  type="button"  title="Wishlist"
                                                                                     id="{{ $product->id }}" onclick="addToWishlist(this.id)">
                                                                                 <i class="fa fa-heart"></i>
                                                                             </button>--}}{{----}}{{----}}{{----}}{{--
                                                                        </li>--}}{{----}}{{--
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>
                                                            <!-- /.cart -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>

                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount/$product->selling_price) * 100;
                                            @endphp

                                            <!-- /.product-list-row -->
                                                <div>
                                                    @if ($product->discount_price == NULL)
                                                        <div class="tag new"><span>new</span></div>
                                                    @else
                                                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- /.product-list -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.category-product-inner -->
                            @endforeach

                            <!--            //////////////////// Product List View END ////////////// -->

                            </div>
                            <!-- /.category-product -->
                        </div>--}}{{--
                        <!-- /.tab-pane #list-container -->
                    </div>
                    <!-- /.tab-content -->
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                </ul>
                                <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container --> </div>
                        <!-- /.text-right -->

                    </div>
                    <!-- /.filters-container -->

                </div>--}}

                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">
                                    @foreach($products as $agro)
                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="{{url('/product/agro/details/'. $agro->id.'/'. $agro->product_slug)}}">
                                                                <img  src="{{asset($agro->product_thumbnail)}}" alt=""></a> </div>
                                                        <!-- /.image -->
                                                        {{--@php
                                                            $amount = $agro->selling_price - $agro->discount_price;
                                                            $discount = ($amount/$agro->selling_price) * 100;
                                                        @endphp
                                                        @if($agro->discount_price == NULL )
                                                            <div class="tag new"><span>New</span></div>
                                                        @else
                                                            <div class="tag hot"><span>{{round($discount)}} %</span></div>
                                                        @endif--}}
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{url('/product/agro/details/'. $agro->id.'/'. $agro->product_slug)}}">{{$agro->product_name}}</a></h3>
                                                        {{--<div class="rating rateit-small"></div>--}}
                                                        <div class="description">{!! Str::words("$agro->short_desc", 15, ' ...') !!}</div>
                                                        <div class="product-price"> <span class="price">Nu. {{$agro->selling_price}} </span></div>

                                                    {{--@if($agro->discount_price == NULL)
                                                        <div class="product-price"> <span class="price">Nu. {{$agro->selling_price}} </span></div>
                                                    @else
                                                        <div class="product-price"> <span class="price">Nu. {{$agro->discount_price}} </span>
                                                            <span class="price-before-discount">Nu. {{$agro->selling_price}}</span> </div>
                                                @endif--}}
                                                    <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        @if($agro->category_id == 2)
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
                                                                </ul>
                                                            </div>
                                                    @endif
                                                    <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                    @endforeach

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->

                        </div>
                        <!-- /.tab-pane -->
                        <!-- ================== END GRID VIEW =================== -->

                        <!-- ================== LIST VIEW =================== -->
                    {{--<div class="tab-pane "  id="list-container">
                        <div class="category-product">
                            @foreach($agros as $agro)
                                <div class="category-product-inner wow fadeInUp">
                                    <div class="products">
                                        <div class="product-list product">
                                            <div class="row product-list-row">
                                                <div class="col col-sm-4 col-lg-4">
                                                    <div class="product-image">
                                                        <div class="image"> <img src="{{asset($agro->product_thumbnail)}}" alt=""> </div>
                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            <a href="{{url('/product/agro/details/'. $agro->id.'/'. $agro->product_slug)}}">{{$agro->product_name}}</a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        @if($agro->discount_price == NULL)
                                                            <div class="product-price"> <span class="price">Nu. {{$agro->selling_price}} </span></div>
                                                        @else
                                                            <div class="product-price"> <span class="price">Nu. {{$agro->discount_price}} </span>
                                                                <span class="price-before-discount">Nu. {{$agro->selling_price}}</span> </div>
                                                    @endif
                                                    <!-- /.product-price -->
                                                        <div class="description m-t-10">
                                                            {{$agro->short_desc}}
                                                        </div>
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

                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-list-row -->
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
                                        <!-- /.product-list -->
                                    </div>
                                    <!-- /.products -->
                                </div>
                        @endforeach
                        <!-- /.category-product-inner -->

                        </div>
                        <!-- /.category-product -->
                    </div>--}}
                    <!-- /.tab-pane #list-container -->
                    </div>
                    <!-- ================== LIST VIEW END=================== -->
                    <!-- /.tab-content -->
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                            {{--<button type="button" class="btn btn-danger mb-5">--}}
                            {{--{{$agros->links()}}</button>--}}

                            <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container --> </div>
                        <!-- /.text-right -->

                    </div>
                    <!-- /.filters-container -->

                </div>
            <!-- /.search-result-container -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    <!-- /.container -->

</div>
<!-- /.body-content -->




@endsection
