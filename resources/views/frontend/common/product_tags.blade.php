
@php
    $tags = \App\Models\AgroProduct::groupBy('product_tag')->select('product_tag')->get();

@endphp


<div class="sidebar-widget product-tag wow fadeInUp">

    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @foreach($tags as $tag)
            <a class="item active" title="{{$tag->product_tag}}"
               href="{{url('/product/agro/tag/'. $tag->product_tag)}}">
                {{ str_replace(',','',$tag->product_tag) }}</a>
            @endforeach
        </div>
        <hr>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
