<div class="form-group">
    {{Form::label('nombre', 'Nombre de la Marca')}}
    {{Form::text('nombre',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('descripcion', 'Descripcion de la Marca')}}
    {{Form::text('descripcion',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('srcimage', 'imagen de la Marca')}}
    {{Form::file('srcimage',null,['class'=>'form-control'])}}
</div>
{{Form::hidden('company_id',1)}}
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary','id'=>'submit'])}}
</div>