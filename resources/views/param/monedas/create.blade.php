@extends('layouts.app1')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Monedas
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route'=>'parametros.monedas.store']) !!}
                        @include('param.monedas.partials.form')
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection