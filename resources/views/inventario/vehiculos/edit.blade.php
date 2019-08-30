@extends('layouts.app1')
@section('title','Vehiculos')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invVehiculos.edit',$invVehiculos) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Actualizar Vehiculo
                    </div>

                    <div class="card-body">
                      @include('layouts.partials.error')
                      {!! Form::model($invVehiculos,['route'=>['inventario.vehiculos.update',$invVehiculos->id],'files'=>true,'method'=>'PUT']) !!}
                        @include('inventario.vehiculos.partials.form')
                      {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
        <a href="{{route('inventario.vehiculos.index')}}" class="btn btn-default">
            <i class="fa fa-arrow-circle-left"></i> Regresar atras
        </a>
    </div>
@endsection
@section('jsporvista')
    <script type="text/javascript">
        $(function() {
            $(".select2").select2();
            $('.summernote').summernote({
                lang: 'es-ES', // default: 'en-US'
                placeholder: 'Escribe aqui...',
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph','height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video','hr']],
                    //['view', ['fullscreen','codeview', 'help']],
                ],
                popover: {
                    air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']]
                    ]
                }
            });
        });
    </script>
@endsection