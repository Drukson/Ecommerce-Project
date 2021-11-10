@extends('admin.admin_master')

@section('admin')


    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach ($agroProducts as $products )
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td> <img src="{{asset($products->product_thumbnail)}}" style="width: 80px; height: 80px;"> </td>
                                            <td>{{$products->product_name}}</td>
                                            <td>{{$products->product_qty}} Kg</td>
                                            <td> Nu. {{$products->selling_price}}</td>

                                            <td>
                                                @if($products->status == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('edit.agroproducts', $products->id)}}" class="btn btn-info" title="Edit">
                                                    <i class="fa fa-pencil"> </i></a>
                                                <a href="{{route('agro.product.delete', $products->id)}}" class="btn btn-danger" id="delete" title="Delete">
                                                    <i class="fa fa-trash"></i></a>
                                                @if($products->status == 1)
                                                    <a href="{{route('inactive.agroproducts', $products->id)}}" class="btn btn-dark" title="Inactive">
                                                        <i class="fa fa-arrow-down"> </i></a>
                                                @else
                                                    <a href="{{route('active.agroproducts', $products->id)}}" class="btn btn-info" title="Active Now">
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
            </div>
        </section>
    </div>

@endsection
