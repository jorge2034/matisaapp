@extends('layouts.app1')
@section('title','Registro compras con factura')
@section('breadcrumbs')
    {{ Breadcrumbs::render('comRegistroComprasFacturas.show',$comRegistroComprasFacturas) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Datos
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$comRegistroComprasFacturas->nombre}}</p>
                        <p><strong>Descripcion: </strong>{{$comRegistroComprasFacturas->descripcion}}</p>
                        <p><strong>Estado: </strong>{!! estado($comRegistroComprasFacturas->status)!!}</p>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('compras.registroComprasFacturas.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection