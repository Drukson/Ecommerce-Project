@php
    $categories = App\Models\Category::orderBy('name','ASC')->get();
@endphp

<div class="sidebar-widget wow fadeInUp">
    <h3 class="section-title">shop by</h3>
    <div class="widget-header">
        <h4 class="widget-title">Category</h4>
    </div>
    <div class="sidebar-widget-body">
        <div class="accordion">
            @foreach($categories as $cat)
                <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapse{{$cat->id}}"
                                                       data-toggle="collapse" class="accordion-toggle collapsed"> {{$cat->name}} </a> </div>
                    <!-- /.accordion-heading -->

                    @php
                        $subcategory = App\Models\SubCategory::where('category_id', $cat->id)->orderBy('name','ASC')->get();
                    @endphp
                    <div class="accordion-body collapse" id="collapse{{$cat->id}}" style="height: 0px;">
                        <div class="accordion-inner">
                            @foreach($subcategory as $subcat)
                                <ul>
                                    <li><a href="{{url('/subcategory/product/'. $subcat->id . '/'. $subcat->slug)}}">
                                            {{$subcat->name}}
                                        </a></li>
                                </ul>
                            @endforeach
                        </div>
                        <!-- /.accordion-inner -->
                    </div>
                    <!-- /.accordion-body -->
                </div>
        @endforeach
        <!-- /.accordion-group -->
        </div>
        <!-- /.accordion -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
