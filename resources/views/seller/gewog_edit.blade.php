@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Gewogs</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('update.gewog', $gewog->id )}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Select Dzongkhag<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="dzongkhag_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Dzongkhag</option>
                                                @foreach($dzongkhag as $details)
                                                    <option value="{{$details->id}}"
                                                        {{$details->id == $gewog->dzongkhag_id ? 'selected':''}}>
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
                                        <h5>Gewog Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="gewog_name" name="gewog_name" value="{{$gewog->gewog_name}}"
                                                   class="form-control" data-validation-required-message="This field is required">
                                            @error('gewog_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Gewog" >
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
