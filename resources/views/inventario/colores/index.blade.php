@extends('layouts.app1')
@section('title','Colores')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invColores') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                {{--Filtros--}}
               @include('inventario.colores.partials.filter')

                <div class="card card-primary card-outline">
                    <div class="card-header h5">
                        Resultados
                        @can('invcolores.create')
                        <a href="{{route('inventario.colores.create')}}" class="btn btn-primary btn-sm pull-right">Crear</a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                      <table class="table table-bordered table-striped dataTable" role="grid" id="tabla">
                          <thead>
                          <tr>
                              <th>Nº</th>
                              <th>Nombre</th>
                              <th>Descripción</th>
                              <th>Estado</th>
                              <th>Acción</th>
                          </tr>
                          </thead>
                          <tbody>
                          @php
                          $cont = 0;
                          @endphp
                          @foreach($invColores as $invColor)
                              <tr>
                                  <td>{{++$cont}}</td>
                                  <td>{{$invColor->nombre}}</td>
                                  <td>{{$invColor->descripcion}}</td>
                                  <td class="text-center">{!!estado($invColor->status)!!}</td>

                                  <td width="100px" class="text-center">
                                      <div class="accion">
                                              @can('invcolores.show')
                                              <a href="{{route('inventario.colores.show',$invColor)}}"
                                                 title="Ver" class="btn btn-sm  btn-accion">
                                                  <i class="fa fa-eye"></i>
                                              </a>
                                              @endcan
                                              @can('invcolores.edit')
                                              <a href="{{route('inventario.colores.edit',$invColor->id)}}"
                                                 title="Modificar" class="btn btn-sm  btn-accion">
                                                  <i class="fa fa-edit"></i>
                                              </a>
                                              @endcan
                                              @can('invcolores.destroy')
                                              <a href="#" onclick="borrar({{$invColor->id}})" title="Eliminar" class="btn btn-sm btn-borrar btn-accion">
                                                  <i class="fa fa-trash-o"></i>
                                              </a>
                                              @endcan
                                      </div>
                                  </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('scriptDataTable')
    <script>
        $(function() {
            $('.select2').select2();
            $('#tabla').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                "paging": true,
                "lengthChange": true,
                //"lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                //"iDisplayLength":			10,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                //cambiar orden de columnas segun corresponda para evitar errores
                "columnDefs": [
                    { "orderable": false, "targets": [4] }
                ],
                responsive: {
                    breakpoints: [
                        {name: 'bigdesktop', width: Infinity},
                        {name: 'meddesktop', width: 1480},
                        {name: 'smalldesktop', width: 1280},
                        {name: 'medium', width: 1188},
                        {name: 'tabletl', width: 1024},
                        {name: 'btwtabllandp', width: 848},
                        {name: 'tabletp', width: 768},
                        {name: 'mobilel', width: 480},
                        {name: 'mobilep', width: 320}
                    ]
                }
            });
        } );

        function borrar(id){
            $.confirm({
                title: 'Confirmar',
                content: '¿Está seguro que desea eliminar el registro?',
                buttons: {
                    aceptar: function () {
                        console.log(id);
                        var ide = id;
                        var token = $("meta[name='csrf-token']").attr("content");
                        $.ajax(
                                {
                                    url: "colores/"+ide,
                                    type: 'DELETE',
                                    data: {
                                        "id": ide,
                                        "_token": token
                                    },
                                    success: function (){
                                        console.log("Eliminado");
                                        location.reload();
                                        //$('#fila'+ide).closest('tr').remove();
                                    }
                                });

                    },
                    cancelar: function () {
                    }
                }
            });
        }
    </script>
@endsection
