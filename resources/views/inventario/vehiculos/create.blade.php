@extends('layouts.app1')
@section('title','Vehiculos')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invVehiculos.create') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear Vehiculo
                    </div>

                    <div class="card-body">
                        @include('layouts.partials.error')
                        {!! Form::open(['route'=>'inventario.vehiculos.store', 'method' => 'POST']) !!}
                        @include('inventario.vehiculos.partials.form')
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.vehiculos.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection