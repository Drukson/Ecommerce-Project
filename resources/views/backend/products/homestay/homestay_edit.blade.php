@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Homestay</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('update.homestay', $homestay->id)}}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        {{--{{       First Row         }}--}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select Category<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Category</option>
                                                            @foreach($category as $details)
                                                                <option value="{{$details->id}}" {{ $details->id == $homestay->category_id ? 'selected':''}}>
                                                                    {{$details->name}} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                 <div class="form-group">
                                                     <h5>Sub-Category<span class="text-danger">*</span></h5>
                                                     <div class="controls">
                                                         <select name="subcategory_id" class="form-control">
                                                             <option value="" selected="" disabled="">Select Sub-Category</option>

                                                         </select>
                                                         @error('subcategory_id')
                                                         <span class="text-danger">{{$message}}</span>
                                                         @enderror
                                                     </div>
                                                 </div>
                                             </div>--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Homestay Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="name" name="name" value="{{$homestay->name}}"
                                                               class="form-control" data-validation-required-message="This field is required">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Number of Rooms<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="no_of_rooms" name="no_of_rooms" value="{{$homestay->no_of_rooms}}"
                                                               class="form-control" data-validation-required-message="This field is required">
                                                        @error('no_of_rooms')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--{{       First Row Ends       }}--}}
                                        {{--{{       Second Row         }}--}}
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Available From <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" value="{{$homestay->available_from}}" id="available_from" name="available_from" class="form-control">
                                                        @error('available_from')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Available To <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" value="{{$homestay->available_to}}" id="available_to" name="available_to" class="form-control">
                                                        @error('available_to')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Price per night <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$homestay->selling_price}}" id="selling_price" name="selling_price" class="form-control" >
                                                        @error('selling_price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Discount Rate <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$homestay->discount_price}}" id="discount_price" name="discount_price" class="form-control">
                                                        @error('discount_price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--{{       Second Row Ends        }}--}}
                                        {{--{{       Third Row Starts        }}--}}
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Homestay Tags <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$homestay->homestay_tag}}" id="homestay_tag" name="homestay_tag"
                                                               class="form-control" value="Village,Remote,Food" data-role="tagsinput">
                                                        @error('homestay_tag')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                        </div>
                                        {{--{{       Third Row Ends     }}--}}

                                        {{--{{       Fouth Row Starts     }}--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Desc <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                    <textarea name="short_desc" id="short_desc" class="form-control" required=""
                                                              placeholder="Enter short description">
                                                         {!! $homestay->short_desc !!}
                                                    </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Desc <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                    <textarea id="editor1" name="long_desc" rows="10" cols="80">
												        {!! $homestay->long_desc !!}
						                            </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--{{       Fourth Row Ends    }}--}}
                                    </div>
                                </div>
                                <hr>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product" >
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Multi Product Images </h4>
                        </div>
                        <form action="{{route('update.homestay.multiimage', $homestay->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm p-3">
                                @foreach($multiImage as $img)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{asset($img->photo_name)}}" style="height: 150px;" class="card-img-top" >
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{route('delete.homestayimg', $img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Image">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </h5>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Choose Image <span class="text-danger"> *</span></label>
                                                    <input class="form-control" type="file" name="homestay_img[{{$img->id}}]">
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right p-3">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Homestay Image" >
                            </div><br>
                        </form>
                    </div>
                </div>
            </div>
        </section>

       <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Thumbnail</h4>
                        </div>
                        <form action="{{route('update.homestay.thumbnail', $homestay->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm p-3">

                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{asset($homestay->homestay_thumbnail)}}" style="height: 150px;" class="card-img-top" >
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Image">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </h5>
                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Choose Image <span class="text-danger"> *</span></label>
                                                <input class="form-control" type="file" name="homestay_thumbnail">
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="text-xs-right p-3">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image" >
                            </div><br>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

    <!-- Image Thumbnail  -->
    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!-- Multi Image -->
    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>
@endsection
