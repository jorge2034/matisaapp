@extends('layouts.app1')
@section('title','Categorias - Inventario')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invcategorias.show',$invcategoria) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Datos categoria
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$invcategoria->nombre}}</p>
                        <p><strong>Descripcion: </strong>{{$invcategoria->descripcion}}</p>
                        <p><strong>Color:: </strong>{{$invcategoria->color}}</p>
                        <p><strong>Estado: </strong>{!! estado($invcategoria->status)!!}</p>
                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.categorias.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection