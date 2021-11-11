@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dzongkhags</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Dzongkhag Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach ($dzongkhag as $sponsers )
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$sponsers->dzongkhag_name}}</td>
                                            <td>
                                                <a href="{{route('edit.dzongkhags', $sponsers->id) }}" class="btn btn-info" title="Edit">
                                                    <i class="fa fa-pencil"> </i></a>
                                                <a href="{{route('delete.dzongkhags', $sponsers->id) }}" class="btn btn-danger" id="delete" title="Delete">
                                                    <i class="fa fa-pencil"></i></a>
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
                            <h3 class="box-title">Add Dzongkhags</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('add.dzongkhags')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Dzongkhag Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="dzongkhag_name" name="dzongkhag_name"
                                                   class="form-control" data-validation-required-message="This field is required">
                                            @error('dzongkhag_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Dzongkhags" >
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
