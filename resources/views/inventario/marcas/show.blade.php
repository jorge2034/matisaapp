@extends('layouts.app1')
@section('title','Marcas - Inventario')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invmarcas.show',$invmarca) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Datos marca
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$invmarca->nombre}}</p>
                        <p><strong>Descripcion: </strong>{{$invmarca->descripcion}}</p>
                        <p><strong>Imagen: </strong>
                        <div class="text-center">
                            <img class="rounded img-show-custom" src="{{$invmarca->archivos->url_path}}" alt="">
                        </div>
                        </p>
                        <p><strong>Estado: </strong>{!! estado($invmarca->status)!!}</p>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.marcas.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection