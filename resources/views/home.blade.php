@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         @foreach( $user->flights AS $flight)
            <div class="card mb-2">
                <div class="card-header">
                    <span class="badge badge-warning badge-pill"> {{ $flight->date }} </span>
                    <span class="float-right">
                        <span class="badge badge-primary">{{ $flight->from}}</span>
                        <span class="badge badge-dark">⬅</span>
                        <span class="badge badge-success"> {{ $flight->to }}</span>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">                 
                        <div class="col-md-3">
                            <strong>نام | Name : </strong><span class="badge badge-danger float-right"> {{ $user->firstname.' '.$user->lastname}} </span>
                        </div>
                        <div class="col-md-3">
                            <strong> کد ملی | N.Code : </strong><span class="badge badge-danger float-right"> {{ $user->code_melli }}</span>
                        </div>
                        <div class="col-md-3">
                            <strong> شماره همراه | Mobile : </strong><span class="badge badge-danger float-right"> {{ $user->mobile }}</span>
                        </div>
                        <div class="col-md-3">
                            <strong> جنسیت | Gender : </strong><span class="badge badge-danger float-right"> {{ $user->gender }}</span>
                        </div>
                    </div>
                    <div class="row">                                         
                        <div class="col-md-3">
                            <strong> مبدا | From :</strong><span class="badge badge-danger float-right"> {{ $flight->from }}</span>
                        </div>
                        <div class="col-md-3">
                            <strong> مقصد | To : </strong><span class="badge badge-danger float-right"> {{ $flight->to }}</span>
                        </div>
                        <div class="col-md-3">
                            <strong> Date :</strong><span class="badge badge-danger float-right"> {{ $flight->date}}</span>
                        </div>
                        <div class="col-md-3">
                            <strong> AirLine : </strong><span class="badge badge-danger float-right"> {{ $flight->airline}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection