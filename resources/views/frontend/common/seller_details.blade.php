@php
    $categories = App\Models\Dzongkhag::orderBy('dzongkhag_name','ASC')->get();
@endphp

<div class="sidebar-widget wow fadeInUp">

    <div class="sidebar-widget-body">
        <div class="accordion">
            @foreach($categories as $cat)
                <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#dzongkhag{{$cat->id}}"
                              data-toggle="collapse" class="accordion-toggle collapsed"> {{$cat->dzongkhag_name}} </a> </div>
                    <!-- /.accordion-heading -->

                    @php
                        $subcategory = \App\Models\Gewog::where('dzongkhag_id', $cat->id)->orderBy('gewog_name','ASC')->get();
                    @endphp
                    <div class="accordion-body collapse" id="dzongkhag{{$cat->id}}" style="height: 0px;">
                        <div class="accordion-inner">
                            @foreach($subcategory as $subcat)
                                <ul>
                                    <li><a href="{{url('/seller/seller-details/'. $subcat->id )}}">
                                            {{$subcat->gewog_name}}
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
