@extends('layouts.app1')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Monedas
                        @can('monedas.create')
                        <a href="{{route('parametros.monedas.create')}}" class="btn btn-primary pull-right">Crear</a>
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
                          @foreach($monedas as $moneda)
                              <tr>
                                  <td>{{$moneda->id}}</td>
                                  <td>{{$moneda->name}}</td>

                                  <td width="10px">
                                  @can('monedas.show')
                                      <a href="{{route('parametros.monedas.show',$moneda->id)}}" class="btn btn-sm btn-default ">Ver</a>
                                  @endcan
                                  </td>
                                  <td width="10px">
                                      @can('monedas.edit')
                                      <a href="{{route('parametros.monedas.edit',$moneda->id)}}" class="btn btn-sm btn-default ">Editar</a>
                                      @endcan
                                  </td>
                                  <td width="10px">
                                      @can('monedas.destroy')
                                      {!! Form::open(['route'=>['parametros.monedas.destroy',$moneda], 'method'=>'DELETE']) !!}
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
                        {{$monedas->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
