@extends('layouts.app1')
@section('title','Registro compras con factura')
@section('breadcrumbs')
    {{ Breadcrumbs::render('comRegistroComprasFacturas.edit',$comRegistroComprasFacturas) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Actualizar Registro compras con factura
                    </div>

                    <div class="card-body">
                      @include('layouts.partials.error')
                      {!! Form::model($comRegistroComprasFacturas,['route'=>['compras.registroComprasFacturas.update',$comRegistroComprasFacturas->id],'method'=>'PUT']) !!}
                        @include('compras.registroComprasFacturas.partials.form')
                      {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('compras.registroComprasFacturas.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection