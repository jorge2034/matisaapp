<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {!! Form::label('inv_marca_id', 'Marca', ['class' => 'control-label'] )  !!}
            {!!  Form::select('inv_marca_id', App\InvMarca::getArray(),  null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {!! Form::label('inv_categoria_id', 'Categoria', ['class' => 'control-label'] )  !!}
            {!!  Form::select('inv_categoria_id', App\InvCategoria::getArray(),  null, ['class' => 'form-control' ]) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('modelo', 'Modelo')}}
            {{Form::text('modelo',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('num_kardex', 'Número de kardex')}}
            {{Form::text('num_kardex',null,['class'=>'form-control'])}}
        </div>
    </div>


    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('year', 'Año')}}
            {{Form::text('year',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('color', 'Color')}}
            {{Form::text('color',null,['class'=>'form-control'])}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('num_motor', 'Número del motor')}}
            {{Form::text('num_motor',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('num_chasis', 'Número del chasis')}}
            {{Form::text('num_chasis',null,['class'=>'form-control'])}}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4 col-sm-4 col-xs-4">
            {{Form::label('transmision', 'Transmisión')}}
            {{Form::text('transmision',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group form-group col-md-4 col-sm-4 col-xs-4">
            {{Form::label('cilindrada', 'Cilindrada')}}
            {{Form::text('cilindrada',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group form-group col-md-4 col-sm-4 col-xs-4">
            {{Form::label('tipo_combustible', 'Tipo de Combustible')}}
            {{Form::text('tipo_combustible',null,['class'=>'form-control'])}}
        </div>
    </div>


<div class="form-group">
    {{Form::label('info_extra', 'Información extra')}}
    {{Form::textarea('info_extra',null,['class'=>'form-control summernote'])}}
</div>
{{Form::hidden('company_id',1)}}
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary','id'=>'submit'])}}
</div>
</div>
