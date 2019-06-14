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
        <section>
            <div class="inputfilter">
                <label for="nombreF" class="blockfilter mr-sm-2">Nombre</label>
                <input type="text" class="blockfilter form-control mb-2 mr-sm-2 mb-sm-0" id="nombreF" name="nombreF" value="{{Request()->nombreF}}">
            </div>
            <div class="inputfilter">
                <label for="direccionF" class="blockfilter mr-sm-2">Dirección</label>
                <input type="text" class="blockfilter form-control mb-2 mr-sm-2 mb-sm-0" id="direccionF" name="direccionF" value="{{Request()->direccionF}}">
            </div>
            <div class="inputfilter">
                <label for="telefonoF" class="blockfilter mr-sm-2">Telefono</label>
                <input type="text" class="blockfilter form-control mb-2 mr-sm-2 mb-sm-0" id="telefonoF" name="telefonoF" value="{{Request()->telefonoF}}">

            </div>
            <div class="inputfilter">
                <label class="blockfilter mr-sm-2" for="estadoF">Estado</label>
                <select class="form-control blockfilter select2 mb-2 mr-sm-2 mb-sm-0" name="estadoF" tabindex="-1" id="estadoF">
                    @foreach($estados as $value => $estado)
                        <option value="{{$value}}" {{Request()->estadoF==$value?'selected':''}}>{{$estado}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="filtro" id="filtro" value="si">
            <div class="inputfilter">
                <label>&nbsp;</label>
                <button type="submit" class="blockfilter btn btn-primary btn-filtro"><i class="fa fa-search"></i> Buscar</button>
            </div>
            @if($filtro)
                <div class="inputfilter">
                    <label>&nbsp;</label>
                    <a href="{{route('config.empresas.index')}}" class="btn btn-default btn-filtro">Finalizar búsqueda</a>
                </div>
            @endif
        </section>

        {!! Form::close() !!}

    </div>
    <!-- /.card-body -->
</div>

