@extends('layouts.app1')
@section('title','Almacenes')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invAlmacenes.show',$invAlmacenes) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Datos
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$invAlmacenes->nombre}}</p>
                        <p><strong>Descripcion: </strong>{{$invAlmacenes->descripcion}}</p>
                        <p><strong>Estado: </strong>{!! estado($invAlmacenes->status)!!}</p>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.almacenes.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection