@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Dzongkhags</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('update.dzongkhags', $dzongkhag->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Dzongkhag Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="dzongkhag_name" name="dzongkhag_name" value="{{$dzongkhag->dzongkhag_name}}"
                                                   class="form-control" data-validation-required-message="This field is required">
                                            @error('dzongkhag_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Dzongkhag" >
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
