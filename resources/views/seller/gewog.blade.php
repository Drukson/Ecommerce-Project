@extends('admin.admin_master')

@section('admin')


    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Gewog</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Dzongkhag </th>
                                        <th>Gewog</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach ($gewog as $sponsers )
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$sponsers->dzongkhag->dzongkhag_name}}</td>
                                            <td>{{$sponsers->gewog_name}}</td>
                                            <td>
                                                <a href="{{route('edit.gewog', $sponsers->id) }}" class="btn btn-info" title="Edit">
                                                    <i class="fa fa-pencil"> </i></a>
                                                <a href="{{route('delete.gewog', $sponsers->id) }}" class="btn btn-danger" id="delete" title="Delete">
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
                            <h3 class="box-title">Add Gewogs</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('add.gewog')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Select Dzongkhag<span class="text-danger">*</span></h5>
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
                                        <h5>Gewog Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="gewog_name" name="gewog_name"
                                                   class="form-control" data-validation-required-message="This field is required">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Gewog" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
