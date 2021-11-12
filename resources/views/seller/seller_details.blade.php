@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Seller Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Dzongkhag</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach ($seller as $sponsers )
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$sponsers->name}}</td>
                                            <td>{{$sponsers->email}}</td>
                                            <td>{{$sponsers->phone}}</td>
                                            <td>{{$sponsers->dzongkhag->dzongkhag_name}}</td>
                                            <td>
                                                <a href="{{route('edit.sellers', $sponsers->id) }}" class="btn btn-info" title="Edit">
                                                    <i class="fa fa-pencil"> </i></a>
                                                <a href="{{route('delete.category', $sponsers->id) }}" class="btn btn-danger" id="delete" title="Delete">
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

            </div>
        </section>
    </div>
@endsection
