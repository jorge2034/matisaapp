@extends('layouts.app1')
@section('title','Empresa')
@section('breadcrumbs')
    {{ Breadcrumbs::render('empresas.show',$empresa) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Datos empresa
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$empresa->nombre}}</p>
                        <p><strong>Descripcion: </strong>{{$empresa->descripcion}}</p>
                        <p><strong>Direccion: </strong>{{$empresa->direccion1}}</p>
                        <p><strong>Telefono: </strong>{{$empresa->telefono1}}</p>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('config.empresas.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection