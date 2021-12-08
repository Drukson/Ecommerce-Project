@extends('admin.admin_master')
@section('admin')

    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-10">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Subscriber List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    @php($i=1)
                                    <tr>
                                        <th>Sl.No </th>
                                        <th>Email</th>
                                        <th>Phone </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subscriber as $item)
                                        <tr>
                                            <td> {{ $i++ }}  </td>
                                            <td> {{ $item->email }}  </td>
                                            <td> {{ $item->phone }} </td>

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
                <!-- /.col -->
                <!--   ------------ Add Category Page -------- -->


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
