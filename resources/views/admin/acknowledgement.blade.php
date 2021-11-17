@extends('admin.admin_master')
@section('admin')
    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="col-12 create-new-account">
                    <h4 class="checkout-subtitle">Acknowledgement</h4>
                    <div class="row alert alert-info">
                        <div class="col-md-12">
                            <span>{{$message}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 
