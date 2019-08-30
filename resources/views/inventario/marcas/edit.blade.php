@extends('layouts.app1')
@section('title','Marcas - Inventario')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invmarcas.edit',$invmarca) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Actualizar Marca
                    </div>

                    <div class="card-body">
                      @include('layouts.partials.error')
                      {!! Form::model($invmarca,['route'=>['inventario.marcas.update',$invmarca->id],'files'=>true,'method'=>'PUT']) !!}
                        @include('inventario.marcas.partials.form')
                      {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.marcas.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection