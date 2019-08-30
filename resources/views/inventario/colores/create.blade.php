@extends('layouts.app1')
@section('title','Colores')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invColores.create') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear Colores
                    </div>
                    <div class="card-body">
                        @include('layouts.partials.error')
                        {!! Form::open(['route'=>'inventario.colores.store', 'method' => 'POST']) !!}
                        @include('inventario.colores.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('inventario.colores.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection