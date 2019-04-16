@extends('layouts.app1')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Usuario
                    </div>

                    <div class="card-body">
                      {!! Form::model($user,['route'=>['config.users.update',$user->id],'method'=>'PUT']) !!}
                        @include('users.partials.form')
                      {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection