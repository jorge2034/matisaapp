@extends('layouts.app1')
@section('title','Almacenes')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invAlmacenes.edit',$invAlmacenes) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Actualizar Almacenes
                    </div>

                    <div class="card-body">
                      @include('layouts.partials.error')
                      {!! Form::model($invAlmacenes,['route'=>['inventario.almacenes.update',$invAlmacenes->id],'method'=>'PUT']) !!}
                        @include('inventario.almacenes.partials.form')
                      {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.almacenes.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection