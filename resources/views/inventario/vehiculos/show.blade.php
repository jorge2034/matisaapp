@extends('layouts.app1')
@section('title','Vehiculos')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invVehiculos.show',$invVehiculos) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Datos
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$invVehiculos->nombre}}</p>
                        <p><strong>Descripcion: </strong>{{$invVehiculos->descripcion}}</p>
                        <p><strong>Estado: </strong>{!! estado($invVehiculos->status)!!}</p>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.vehiculos.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection