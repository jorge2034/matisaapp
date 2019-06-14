@extends('layouts.app1')
@section('title','Moneda')
{{--@section('breadcrumbs')
    {{ Breadcrumbs::render('empresas') }}
@endsection--}}
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Filtros</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        The body of the card
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="card">
                    <div class="card-header">Monedas
                        @can('monedas.create')
                        <a href="{{route('parametros.monedas.create')}}" class="btn btn-primary pull-right">Crear</a>
                        @endcan
                    </div>


                    <div class="card-body">
                      <table class="table table-bordered" id="tabla">
                          <thead>
                          <tr>
                              <th width="10px">ID</th>
                              <th>Nombre</th>
                              <th>Simbolo</th>
                              <th>Estado</th>
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($monedas as $moneda)
                              <tr>
                                  <td>{{$moneda->id}}</td>
                                  <td>{{$moneda->name}}</td>
                                  <td>{{$moneda->simbolo}}</td>
                                  <td>{{$moneda->status}}</td>

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
                        {{--Desactivado paginacion del servidor nativo laravel y modificacion del controlador paginate()--}}
                       {{--{{$monedas->render()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptDataTable')
    <script>
        $(function() {
            $('#tabla').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                "paging": true,
                "lengthChange": true,
                "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                //cambiar orden de columnas segun corresponda para evitar errores
                "columnDefs": [
                    { "orderable": false, "targets": [4,5,6] }
                ]
            });
        } );
    </script>
@endsection
