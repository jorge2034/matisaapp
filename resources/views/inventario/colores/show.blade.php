@extends('layouts.app1')
@section('title','Colores')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invColores.show',$invColores) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Datos
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$invColores->nombre}}</p>
                        <p><strong>Descripcion: </strong>{{$invColores->descripcion}}</p>
                        <p><strong>Estado: </strong>{!! estado($invColores->status)!!}</p>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.colores.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection