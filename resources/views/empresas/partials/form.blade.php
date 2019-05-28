<div class="form-group">
    {{Form::label('nombre', 'Nombre de la Empresa')}}
    {{Form::text('nombre',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('descripcion', 'Descripcion de la Empresa')}}
    {{Form::text('descripcion',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('direccion1', 'Direccion de la Empresa')}}
    {{Form::text('direccion1',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('telefono1', 'Telefono de la Empresa')}}
    {{Form::text('telefono1',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>