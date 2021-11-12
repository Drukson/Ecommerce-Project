@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Village</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Dzongkhag</th>
                                        <th>Gewog</th>
                                        <th>Village</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach ($village as $sponsers )
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $sponsers->dzongkhag->dzongkhag_name }}</td>
                                            <td>{{ $sponsers->gewog->gewog_name }}</td>

                                            <td>{{ $sponsers->village_name }}</td>
                                            <td>
                                                <a href="{{route('edit.village', $sponsers->id) }}" class="btn btn-info" title="Edit">
                                                    <i class="fa fa-pencil"> </i></a>
                                                <a href="{{route('delete.village', $sponsers->id) }}" class="btn btn-danger" id="delete" title="Delete">
                                                    <i class="fa fa-desktop"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Village</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('add.village')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Dzongkhag<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="dzongkhag_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Dzongkhag</option>
                                                @foreach($dzongkhag as $details)
                                                    <option value="{{$details->id}}">{{$details->dzongkhag_name}}</option>
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

                                            </select>
                                            @error('gewog_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Village <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="village_name" name="village_name"
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
