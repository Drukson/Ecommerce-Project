@foreach($agros as $agro)
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
                    {{--<div class="description">{{$agro->short_desc}}</div>--}}

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
        <!-- /.product -->

    </div>
    <!-- /.products -->
</div>
@endforeach
