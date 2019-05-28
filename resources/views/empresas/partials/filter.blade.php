<div class="card card-primary">
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

        {!! Form::open(['route'=>'config.empresas.index','method'=>'GET', 'class'=>'form-inline'])!!}
        <label for="nombreF" class="mr-sm-2">Nombre</label><br>
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nombreF" name="nombreF" value="{{Request()->nombreF}}">

        <label for="direccionF" class="mr-sm-2">Dirección</label><br>
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="direccionF" name="direccionF" value="{{Request()->direccionF}}">

        <label for="telefonoF" class="mr-sm-2">Telefono</label><br>
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="telefonoF" name="telefonoF" value="{{Request()->telefonoF}}">

        <label class="mr-sm-2" for="select123">Estado</label>
        <select class="form-control select2 mb-2 mr-sm-2 mb-sm-0" name="estadoF" tabindex="-1" id="estadoF">
            @foreach($estados as $value => $estado)
                <option value="{{$value}}" {{Request()->estadoF==$value?'selected':''}}>{{$estado}}</option>
            @endforeach
        </select>
        <input type="hidden" name="filtro" id="filtro" value="si">
        <button type="submit" class="btn btn-primary btn-filtro">Buscar</button>
        @if($filtro)
            <a href="{{route('config.empresas.index')}}" class="btn btn-default btn-filtro">Finalizar búsqueda</a>
        @endif

        {!! Form::close() !!}

    </div>
    <!-- /.card-body -->
</div>

