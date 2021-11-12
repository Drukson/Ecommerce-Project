-@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Village</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('update.village', $village->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Select Dzongkhag<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="dzongkhag_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Dzongkhag</option>
                                                @foreach($dzongkhag as $details)
                                                    <option value="{{$details->id}}"
                                                        {{$details->id == $village->dzongkhag_id ? 'selected':''}}>
                                                        {{$details->dzongkhag_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('dzongkhag_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Gewog<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gewog_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Gewog</option>
                                                @foreach($gewog as $details)
                                                    <option value="{{$details->id}}"
                                                        {{$details->id == $village->gewog_id ? 'selected':''}}>
                                                        {{$details->gewog_name}} </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Village Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="village_name" name="village_name" value="{{$village->village_name}}"
                                                   class="form-control" data-validation-required-message="This field is required">
                                            @error('village_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Village" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="dzongkhag_id"]').on('change', function(){
                var dzongkhag_id = $(this).val();
                if(dzongkhag_id) {
                    $.ajax({
                        url: "{{  url('/dzongkhag/gewog/ajax') }}/"+dzongkhag_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="gewog_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="gewog_id"]').append('<option value="'+ value.id +'">' + value.gewog_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection



