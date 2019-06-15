<div class="form-group">
    {{Form::label('nombre', 'Nombre de la Categoria')}}
    {{Form::text('nombre',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('descripcion', 'Descripcion de la Categoria')}}
    {{Form::text('descripcion',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('color', 'Color')}}
    {{Form::color('color',null,['class'=>'form-control'])}}
</div>
{{Form::hidden('company_id',1)}}
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>