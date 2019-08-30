@extends('layouts.app1')
@section('title','Inventario')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invInventarios.show',$invInventarios) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Datos
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$invInventarios->nombre}}</p>
                        <p><strong>Descripcion: </strong>{{$invInventarios->descripcion}}</p>
                        <p><strong>Estado: </strong>{!! estado($invInventarios->status)!!}</p>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.inventarios.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection