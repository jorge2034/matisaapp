@extends('layouts.app1')
@section('title','Usuario')
@section('breadcrumbs')
    {{ Breadcrumbs::render('users.create') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear Usuario
                    </div>

                    <div class="card-body">
                        @include('layouts.partials.error')
                        {!! Form::open(['route'=>'config.users.store']) !!}
                        @include('users.partials.form')
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('config.users.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection