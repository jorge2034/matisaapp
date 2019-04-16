@extends('layouts.app1')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Monedas
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$moneda->name}}</p>
                        <p><strong>Simbolo: </strong>{{$moneda->simbolo}}</p>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection