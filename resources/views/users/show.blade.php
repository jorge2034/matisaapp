@extends('layouts.app1')
@section('title','Usuario')
@section('breadcrumbs')
    {{ Breadcrumbs::render('users.show',$user) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Usuarios
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre completo: </strong>{{$user->name}} {{$user->lastname}}</p>
                        <p><strong>Email: </strong>{{$user->email}}</p>
                        <p><strong>Sucursal: </strong>{{\App\Company::getNameForList($user->company_id)}}</p>
                        <p><strong>Estado: </strong>{!! estado($user->status)!!}</p>

                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('config.users.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection