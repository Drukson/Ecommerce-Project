@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-5">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Partners</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('update.sponsor', $sponsor->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <input type="hidden" name="oldImage" value="{{$sponsor->image}}">
                                    <div class="form-group">
                                        <h5>Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name" name="name" value="{{$sponsor->name}}"
                                                   class="form-control" data-validation-required-message="This field is required">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Slug <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="slug" name="slug" type="text" value="{{$sponsor->slug}}"
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
                                    <div class="form-group">
                                        <img src="{{asset($sponsor->image)}}" style="width: 150px; border-radius: 50%">

                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Sponsor" >
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
