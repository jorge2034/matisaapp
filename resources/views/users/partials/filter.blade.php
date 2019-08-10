<div class="card card-matisa">
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

        {!! Form::open(['route'=>'config.users.index','method'=>'GET', 'class'=>'form-inline'])!!}
        <section>
        <div class="inputfilter">
        <label for="nameF" class="blockfilter mr-sm-2">Nombre</label>
        <input type="text" class="blockfilter form-control mb-2 mr-sm-2 mb-sm-0" id="nameF" name="nameF" value="{{Request()->nameF}}">
        </div>

        <div class="inputfilter">
        <label for="lastnameF" class="blockfilter mr-sm-2">Apellido</label>
        <input type="text" class="blockfilter form-control mb-2 mr-sm-2 mb-sm-0" id="lastnameF" name="lastnameF" value="{{Request()->lastnameF}}">
        </div>
        <div class="inputfilter">
        <label for="emailF" class="blockfilter mr-sm-2">Email</label>
        <input type="text" class="blockfilter form-control mb-2 mr-sm-2 mb-sm-0" id="emailF" name="emailF" value="{{Request()->emailF}}">
        </div>

        <div class="inputfilter">
        <label class="blockfilter mr-sm-2" for="sucursalF">Sucursal</label>
        <select class="blockfilter form-control select2 mb-2 mr-sm-2 mb-sm-0" name="sucursalF" tabindex="-1" id="sucursalF">
            @foreach(\App\Company::getArray() as $value => $sucursal)
                <option value="{{$value}}" {{Request()->sucursalF==$value?'selected':''}}>{{$sucursal}}</option>
            @endforeach
        </select>
        </div>

        <div class="inputfilter">
        <label class="blockfilter mr-sm-2" for="estadoF">Estado</label>
        <select class="blockfilter form-control select2 mb-2 mr-sm-2 mb-sm-0" name="estadoF" tabindex="-1" id="estadoF">
            @foreach($estados as $value => $estado)
                <option value="{{$value}}" {{Request()->estadoF==$value?'selected':''}}>{{$estado}}</option>
            @endforeach
        </select>
        </div>

        <input type="hidden" name="filtro" id="filtro" value="si">
        <div class="inputfilter">
            <label>&nbsp;</label>
        <button type="submit" class="blockfilter btn btn-primary btn-filtro">Buscar</button>
        </div>

        @if($filtro)
            <div class="inputfilter">
                <label>&nbsp;</label>
            <a href="{{route('config.users.index')}}" class="btn btn-default btn-filtro">Finalizar búsqueda</a>
            </div>
        @endif
        </section>
        {!! Form::close() !!}

    </div>
    <!-- /.card-body -->
</div>

