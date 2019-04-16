@extends('layouts.app1')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Roles
                        @can('roles.create')
                        <a href="{{route('config.roles.create')}}" class="btn btn-primary pull-right">Crear</a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>

                                    <td width="10px">
                                        @can('roles.show')
                                        <a href="{{route('config.roles.show',$role->id)}}" class="btn btn-sm btn-default ">Ver</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('roles.edit')
                                        <a href="{{route('config.roles.edit',$role->id)}}" class="btn btn-sm btn-default ">Editar</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('roles.destroy')
                                        {!! Form::open(['route'=>['config.roles.destroy',$role], 'method'=>'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                        {!! Form::close() !!}
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$roles->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
