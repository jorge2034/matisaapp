@extends('layouts.app1')
@section('title','Categorias - Inventario')
@section('breadcrumbs')
    {{ Breadcrumbs::render('invcategorias') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                {{--Filtros--}}
               @include('inventario.categorias.partials.filter')

                <div class="card card-primary card-outline">
                    <div class="card-header h5">
                        Resultados
                        @can('invcategorias.create')
                        <a href="{{route('inventario.categorias.create')}}" class="btn btn-primary btn-sm pull-right">Crear</a>
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
                              <th>Color</th>
                              <th>Estado</th>
                              <th>Acción</th>
                          </tr>
                          </thead>
                          <tbody>
                          @php
                          $cont = 0;
                          @endphp
                          @foreach($invcategorias as $invcategoria)
                              <tr>
                                  <td>{{++$cont}}</td>
                                  <td>{{$invcategoria->nombre}}</td>
                                  <td>{{$invcategoria->descripcion}}</td>
                                  <td class="text-center"><i class="fa fa-2x fa-circle" style="color:{{$invcategoria->color}}"></i></td>
                                  <td class="text-center">{!!estado($invcategoria->status)!!}</td>

                                  <td width="100px" class="text-center">
                                      <div class="accion">
                                              @can('invcategorias.show')
                                              <a href="{{route('inventario.categorias.show',$invcategoria)}}"
                                                 title="Ver" class="btn btn-sm  btn-accion">
                                                  <i class="fa fa-eye"></i>
                                              </a>
                                              @endcan
                                              @can('invcategorias.edit')
                                              <a href="{{route('inventario.categorias.edit',$invcategoria->id)}}"
                                                 title="Modificar" class="btn btn-sm  btn-accion">
                                                  <i class="fa fa-edit"></i>
                                              </a>
                                              @endcan
                                              @can('invcategorias.destroy')
                                              <a href="#" onclick="borrar({{$invcategoria->id}})" title="Eliminar" class="btn btn-sm btn-borrar btn-accion">
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
                        {{--{{$empresas->render()}}--}}
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
                    { "orderable": false, "targets": [5] }
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
                                    url: "categorias/"+ide,
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

        //Colorpicker
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

    </script>
@endsection
