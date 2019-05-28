@extends('layouts.app1')
@section('title','Empresa')
@section('breadcrumbs')
    {{ Breadcrumbs::render('empresas.create') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear Empresa
                    </div>

                    <div class="card-body">
                        @include('layouts.partials.error')
                        {!! Form::open(['route'=>'config.empresas.store']) !!}
                        @include('empresas.partials.form')
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('config.empresas.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection