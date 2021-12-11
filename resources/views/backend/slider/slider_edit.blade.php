@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('update.slider', $slider->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="oldImage" value="{{$slider->slider_image}}">
                                    <div class="form-group">
                                        <h5>Link <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="title" name="title" value="{{$slider->title}}"
                                                   class="form-control" data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    {{--<div class="form-group">
                                        <h5>Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="description" name="description" type="text" value="{{$slider->description}}"
                                                   class="form-control" data-validation-required-message="This field is required">
                                        </div>
                                    </div>--}}
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="slider_image" name="slider_image" type="file"
                                                   class="form-control" data-validation-required-message="This field is required">
                                        </div>
                                        <div><br>
                                            <img src="{{asset($slider->slider_image)}}" style="width: 200px;">
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Slider" >
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
