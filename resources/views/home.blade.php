@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if($errors->any())
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        </div>
        @endif
        
        <div class="card mb-2" style="border: 2px solid rgb(211, 228, 206)">
                <div class="card-header" style="background-color: #f5ff9c">
                    <span class="badge badge-warning badge-pill">{{ $user->firstname.' '.$user->lastname}}</span>
                    <span class="float-right">
                        <span class="badge badge-warning"> اطلاعات کاربری  </span>                        
                    </span>
                </div>
                <div class="card-body" style="background-color: #ffd; direction: rtl; text-align: right;">
                    <div class="row">                 
                        <div class="col-md-3">
                            <strong> نام : </strong> {{ $user->firstname }} 
                        </div>
                        <div class="col-md-3">
                            <strong> نام خانوادگی: </strong> {{ $user->lastname }} 
                        </div>
                        <div class="col-md-3">
                            <strong> کد ملی : </strong> {{ $user->code_melli }}
                        </div>
                        <div class="col-md-3">
                            <strong> جنسیت  : </strong>{{ $user->gender }}
                        </div>
                    </div>   
                    <div class="row">                 
                        <div class="col-md-3">
                            <strong> شماره موبایل : </strong>{{ $user->mobile }}
                        </div> 
                        <div class="col-md-3">
                            <strong> ایمیل : </strong>{{ $user->email }}
                        </div>
                        <div class="col-md-3">
                            <strong>رمز عبور :  </strong>12345
                        </div> 
                        <div class="col-md-3">
                            <strong> تاریخ ثبت نام :  </strong>{{ $user->updated_at }}
                        </div> 
                    </div>                  
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center mb-2"><h3>لیست پروازها</h3></div>
            </div> 

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
                <div class="card-body" style=" direction: rtl; text-align: right;">
                    <div class="row">                 
                        <div class="col-md-3">
                            <strong>نام مسافر  :</strong> {{ $user->firstname.' '.$user->lastname}} 
                        </div>
                        <div class="col-md-3">
                            <strong> کد ملی مسافر : </strong> {{ $user->code_melli }}
                        </div>
                        <div class="col-md-3">
                            <strong> شماره همراه : </strong> {{ $user->mobile }}
                        </div>
                        <div class="col-md-3">
                            <strong> جنسیت  : </strong> {{ $user->gender }}
                        </div>
                    </div>
                    <div class="row">                                         
                        <div class="col-md-3">
                            <strong> مبدا :</strong> {{ $flight->from }}
                        </div>
                        <div class="col-md-3">
                            <strong> مقصد : </strong> {{ $flight->to }}
                        </div>
                        <div class="col-md-3">
                            <strong> تاریخ  :</strong> {{ $flight->date}}
                        </div>
                        <div class="col-md-3">
                            <strong>خط هوائی : </strong> {{ $flight->airline}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach            
        </div>
    </div>
</div>
@endsection