@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Sliders</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach ($slider as $sponsers )
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td> <img src="{{asset($sponsers->slider_image)}}" style="width: 100px;"> </td>
                                            <td>
                                                @if($sponsers->title == NULL)
                                                    <span class="badge badge-pill badge-danger">No Title</span>
                                                @else
                                                    <span class="badge badge-pill text-success">{{$sponsers->title}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($sponsers->status == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{route('edit.slider', $sponsers->id) }}" class="btn btn-info btn-sm" title="Edit">
                                                    <i class="fa fa-pencil"> </i></a>
                                                <a href="{{route('delete.slider', $sponsers->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete">
                                                    <i class="fa fa-trash"></i></a>
                                                @if($sponsers->status == 1)
                                                    <a href="{{route('inactive.slider', $sponsers->id)}}" class="btn btn-danger btn-sm" title="Inactive">
                                                        <i class="fa fa-arrow-down"> </i></a>
                                                @else
                                                    <a href="{{route('active.slider', $sponsers->id)}}" class="btn btn-info btn-sm" title="Active Now">
                                                        <i class="fa fa-arrow-up"> </i></a>
                                                @endif
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
                            <h3 class="box-title">Add Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('add.slider')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="title" name="title"
                                                   class="form-control" data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="description" name="description" type="text"
                                                   class="form-control" data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="slider_image" name="slider_image" type="file"
                                                   class="form-control" data-validation-required-message="This field is required">
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Slider" >
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
