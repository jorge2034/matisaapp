<div class="form-group">
    {{Form::label('name', 'Nombre de la Empresa')}}
    {{Form::text('name',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('simbolo', 'Descripcion de la Empresa')}}
    {{Form::text('simbolo',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>