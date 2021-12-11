@php
    $slider = \App\Models\Slider::where('status', 1)->orderBy('id', 'DESC')->get();
@endphp
<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
        @foreach($slider as $slides)
            <a target="_self" rel="nofollow" href="{{$slides->title}}">
            <div class="item" style="background-image: url( {{asset($slides->slider_image)}});">
                {{--<div class="container-fluid">
                    <div class="caption bg-color vertical-center text-left">
                        <div class="big-text fadeInDown-1" style="color: white"> {{ $slides->title}}</div>
                        <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slides->description}}</span> </div>

                        --}}{{--<div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>--}}{{--
                    </div>
                    <!-- /.caption -->
                </div>--}}
                <!-- /.container-fluid -->
            </div>
            </a>
    @endforeach
    <!-- /.item -->
    </div>
    <!-- /.owl-carousel -->
</div>
