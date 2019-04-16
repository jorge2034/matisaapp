@extends('layouts.app1')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Monedas
                  
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
                          @foreach($users as $user)
                              <tr>
                                  <td>{{$user->id}}</td>
                                  <td>{{$user->name}}</td>

                                  <td width="10px">
                                  @can('users.show')
                                      <a href="{{route('config.users.show',$user->id)}}" class="btn btn-sm btn-default ">Ver</a>
                                  @endcan
                                  </td>
                                  <td width="10px">
                                      @can('users.edit')
                                      <a href="{{route('config.users.edit',$user->id)}}" class="btn btn-sm btn-default ">Editar</a>
                                      @endcan
                                  </td>
                                  <td width="10px">
                                      @can('users.destroy')
                                      {!! Form::open(['route'=>['config.users.destroy',$user], 'method'=>'DELETE']) !!}
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
                        {{$users->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
