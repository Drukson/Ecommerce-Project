
@php
    $tags = \App\Models\AgroProduct::groupBy('product_tag')->select('product_tag')->get();
    $handicraft = \App\Models\Handicraft::groupBy('handicraft_tag')->select('handicraft_tag')->get();
    $homestay = \App\Models\Homestay::groupBy('homestay_tag')->select('homestay_tag')->get();
@endphp


<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @foreach($tags as $tag)
            <a class="item active" title="{{$tag->product_tag}}"
               href="{{url('/product/agro/tag/'. $tag->product_tag)}}">
                {{ str_replace(',','',$tag->product_tag) }}</a>
            @endforeach
        </div>
        <hr>
        <div class="tag-list">
            @foreach($handicraft as $tag)
                <a class="item active" title="{{$tag->handicraft_tag}}"
                   href="{{url('/product/handicraft/tag/'. $tag->handicraft_tag)}}">
                    {{str_replace(',','',$tag->handicraft_tag)}}</a>
            @endforeach
        </div>
        <hr>
        <div class="tag-list">
            @foreach($homestay as $tag)
                <a class="item active" title="{{$tag->homestay_tag}}"
                   href="{{url('/product/homestay/tag/'. $tag->homestay_tag)}}">
                    {{str_replace(',','',$tag->homestay_tag)}}</a>
            @endforeach
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
