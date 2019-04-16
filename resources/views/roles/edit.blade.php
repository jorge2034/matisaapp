@extends('layouts.app1')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Rol
                    </div>

                    <div class="card-body">
                        {!! Form::model($role,['route'=>['config.roles.update',$role->id],'method'=>'PUT']) !!}
                        @include('roles.partials.form')
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection