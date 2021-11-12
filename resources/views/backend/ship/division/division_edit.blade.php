@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Divisions</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('update.division', $division->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Division Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="division_name" name="division_name" value="{{$division->division_name}}"
                                                   class="form-control" data-validation-required-message="This field is required">
                                            @error('division_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Division" >
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
