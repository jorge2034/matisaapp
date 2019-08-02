@extends('layouts.app1')
@section('title','Usuarios')
@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{--Filtros--}}
                @include('users.partials.filter')

                <div class="card card-matisa card-outline">
                    <div class="card-header h5">
                        Resultados
                        @can('users.create')
                        <a href="{{route('config.users.create')}}" class="btn btn-primary btn-sm pull-right">Crear</a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped dataTable" role="grid" id="tabla">
                          <thead>
                          <tr>
                              <th width="10px">Nº</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Email</th>
                              <th>Sucursal</th>
                              <th>Estado</th>
                              <th>Acción</th>
                          </tr>
                          </thead>
                          <tbody>
                          @php
                          $cont = 0;
                          @endphp
                          @foreach($users as $user)
                              <tr>
                                  <td>{{++$cont}}</td>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->lastname}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->company->nombre}}</td>
                                  <td class="text-center">{!!estado($user->status)!!}</td>

                                  <td width="100px" class="text-center">
                                      <div class="accion">
                                          @can('users.show')
                                          <a href="{{route('config.users.show',$user->id)}}"
                                             title="Ver" class="btn btn-sm  btn-accion">
                                              <i class="fa fa-eye"></i>
                                          </a>
                                          @endcan
                                          @can('users.edit')
                                          <a href="{{route('config.users.edit',$user->id)}}"
                                             title="Modificar" class="btn btn-sm  btn-accion">
                                              <i class="fa fa-edit"></i>
                                          </a>
                                          @endcan
                                          @can('users.destroy')
                                          <a href="#" onclick="borrar({{$user->id}})" title="Eliminar" class="btn btn-sm btn-borrar btn-accion">
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
                    { "orderable": false, "targets": [6] }
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
                                    url: "users/"+ide,
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
