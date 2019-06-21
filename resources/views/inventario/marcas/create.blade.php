@extends('layouts.app1')
@section('title','Marcas - Inventario')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invmarcas.create') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear Marca (Inventario)
                    </div>

                    <div class="card-body">
                        @include('layouts.partials.error')
                        {!! Form::open(['route'=>'inventario.marcas.store', 'method' => 'POST', 'files'=>'true']) !!}
                        @include('inventario.marcas.partials.form')
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.marcas.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection