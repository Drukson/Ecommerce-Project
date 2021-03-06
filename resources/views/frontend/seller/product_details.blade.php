@extends('frontend.main_master')

@section('content')
@section('title')

@endsection

{{--<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                @foreach($breadsubcat as $item)
                    <li class='active'>{{ $item->category->name }}</li>
                @endforeach
                @foreach($breadsubcat as $item)
                    <li class='active'>{{ $item->name }}</li>
                @endforeach
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

                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-american-sign-language-interpreting"></i> Sellers</div>
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            @include('frontend.common.seller_details')
                        </div>
                    </div>
                </div>


                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-american-sign-language-interpreting"></i> Sellers</div>
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            @include('frontend.common.category')
                        </div>
                    </div>
                </div>
                <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
                <!-- ================== SECTION ??? HERO =================== -->

                <div id="category" class="category-carousel hidden-xs">
                    <div class="item">
                        <div class="image">
                            <img src="{{asset('frontend/assets/images/banners/cat-banner-1.jpg')}}" alt="" class="img-responsive"> </div>
                        <div class="container-fluid">
                            <div class="caption vertical-top text-left">
                                <div class="big-text"> Big Sale </div>
                                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                {{--<div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>--}}
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                </div>
                {{--@foreach($breadsubcat as $item)
                    <span class="badge badge-danger" style="background: #808080">{{ $item->category->name }} </span>
                @endforeach

                @foreach($breadsubcat as $item)
                    <span class="badge badge-danger" style="background: #FF0000">{{ $item->name }} </span>

                @endforeach--}}
               {{-- <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <div class="col col-sm-6 col-md-2">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                </ul>
                            </div>
                            <!-- /.filter-tabs -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>--}}
                <!-- ================== GRID VIEW =================== -->
                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">
                                    {{--@foreach($agros as $agro)
                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="{{url('/product/agro/details/'. $agro->id.'/'. $agro->product_slug)}}">
                                                                <img  src="{{asset($agro->product_thumbnail)}}" alt=""></a> </div>
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
                                                        <h3 class="name"><a href="{{url('/product/agro/details/'. $agro->id.'/'. $agro->product_slug)}}">{{$agro->name}}</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description">{{$agro->short_desc}}</div>


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
                                                                <li --}}{{--class="lnk wishlist"--}}{{-->
                                                                    <button class="btn btn-primary icon"  type="button" title="Wishlist"
                                                                            id="{{ $agro->id }}" onclick="addToWishlist(this.id)">
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
                                @endforeach--}}
                                <!-- /.item -->

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
                                                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                        </li>
                                                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                                <button type="button" class="btn btn-danger mb-5">
                                    {{--{{$agros->links()}}--}}</button>

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
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->

        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
    <!-- /.container -->

</div>
<!-- /.body-content -->



@endsection
