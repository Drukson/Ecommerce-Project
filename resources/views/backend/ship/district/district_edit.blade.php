@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Places</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('update.subdistrict', $subdistrict->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Dzongkhag<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach($division as $details)
                                                    <option value="{{$details->id}}"
                                                        {{$details->id == $subdistrict->division_id ? 'selected':''}}>
                                                        {{$details->division_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>PLace Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="district_name" name="district_name" value="{{$subdistrict->district_name}}"
                                                   class="form-control" data-validation-required-message="This field is required">
                                            @error('district_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Places" >
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
