@php
    $categories = App\Models\Dzongkhag::orderBy('dzongkhag_name','ASC')->get();
@endphp

<div class="sidebar-widget wow fadeInUp">

    <div class="sidebar-widget-body">
        <div class="accordion">
            @foreach($categories as $counter=>$cat)
                <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#dzongkhag{{$cat->id}}"
                              data-toggle="collapse" class="accordion-toggle collapsed"> {{$cat->dzongkhag_name}} </a> </div>
                    <!-- /.accordion-heading -->

                    @php
                        $subcategory = \App\Models\Gewog::where('dzongkhag_id', $cat->id)->orderBy('gewog_name','ASC')->get();
                    @endphp
                    <div class="accordion-body collapse" id="dzongkhag{{$cat->id}}" style="height: 0px;">
                        <div class="accordion-inner">
                            @foreach($subcategory as $index=> $subcat)
                                <ul>
                                    <li id="sidebar{{$counter}}_{{$index}}"><a href="{{url('/seller/seller-details/'. $subcat->id. '/'.$counter.'_'.$index )}}">
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
@if(isset($count))
    <script type="text/javascript">
        alert('#sidebar'+{{$count}});
        $('#sidebar'+{{$count}}).addClass('bg-info')
    </script>
    @endif



