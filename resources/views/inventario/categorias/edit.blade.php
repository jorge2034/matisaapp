@extends('layouts.app1')
@section('title','Categorias - Inventario')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invcategorias.edit',$invcategorias) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Actualizar Categoria
                    </div>

                    <div class="card-body">
                      @include('layouts.partials.error')
                      {!! Form::model($invcategorias,['route'=>['inventario.categorias.update',$invcategorias->id],'method'=>'PUT']) !!}
                        @include('inventario.categorias.partials.form')
                      {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.categorias.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection