@extends('layouts.app1')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Usuarios
                    </div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$user->name}}</p>
                        <p><strong>Simbolo: </strong>{{$user->email}}</p>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection