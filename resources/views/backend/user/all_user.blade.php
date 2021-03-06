@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All User |</h3>
                            <h3 class="box-title">Total User <span class="badge badge-pill badge-danger"> {{ count($users) }} </span> </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image </th>
                                        <th>Name </th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td><img src="{{ (!empty($user->profile_photo_path))? url('uploads/user_images/'.$user->profile_photo_path):url('uploads/no_image.png') }}" style="width: 50px; height: 50px;"> </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td> <span class="badge badge-pill badge-success">Active Now</span></td>

                                            <td>

                                                <a href="{{route('delete.users', $user->id)}} " class="btn btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.end col-12 -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>


@endsection
