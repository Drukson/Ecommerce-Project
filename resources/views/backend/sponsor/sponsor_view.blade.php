@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <!-- Main content -->
    <section class="content">
        <div class="row">
         <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Implementing Partners</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach ($sponsor as $sponsers )
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$sponsers->name}}</td>
                                <td><img src="{{asset($sponsers->image)}}" style="width: 70px;"> </td>
                                <td>
                                    <a href="{{route('edit.sponsor', $sponsers->id) }}" class="btn btn-info" title="Edit">
                                    <i class="fa fa-pencil"> </i></a>
                                    <a href="{{route('delete.sponsor', $sponsers->id) }}" class="btn btn-danger" id="delete" title="Delete">
                                        <i class="fa fa-trash"></i></a>
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
                    <h3 class="box-title">Add Partners</h3>
                </div>
                        <!-- /.box-header -->
            <div class="box-body">
             <div class="table-responsive">
                <form action="{{route('add.sponsor')}}" method="post" enctype="multipart/form-data">
                  @csrf

                    <div class="form-group">
                        <h5>Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="name" name="name"
                               class="form-control" data-validation-required-message="This field is required">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                   <div class="form-group">
                            <h5>Slug <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input id="slug" name="slug" type="text"
                                   class="form-control" data-validation-required-message="This field is required">
                            </div>
                   </div>
                    <div class="form-group">
                        <h5>Image <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input id="image" name="image" type="file"
                                   class="form-control" data-validation-required-message="This field is required">
                        </div>
                    </div>

                    <div class="text-xs-right">
                       <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Sponsor" >
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
