@extends('layouts.app1')
@section('title','Inventario')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invInventarios.create') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear Inventario
                    </div>
                    <div class="card-body">
                        @include('layouts.partials.error')
                        {!! Form::open(['route'=>'inventario.inventarios.store', 'method' => 'POST']) !!}
                        @include('inventario.inventarios.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('inventario.inventarios.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection
@section('jsporvista')
    <script type="text/javascript">
        $(function() {
            $(".select2").select2({
                placeholder: 'Seleccione'
            });
        });
    </script>
@endsection