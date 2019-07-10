<div class="form-group">
    {{Form::label('nombre', 'Nombre')}}
    {{Form::text('nombre',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('descripcion', 'Descripción')}}
    {{Form::text('descripcion',null,['class'=>'form-control'])}}
</div>
{{Form::hidden('company_id',1)}}
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary','id'=>'submit'])}}
</div>