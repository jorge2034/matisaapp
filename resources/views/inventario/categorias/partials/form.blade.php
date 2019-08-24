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
{{Form::hidden('company_id',\Auth::user()->company_id)}}
<div class="form-group">
    {!! Form::label('status', 'Estado', ['class' => 'control-label'] )  !!}
    <input type="checkbox" id="status" name="status" class="checkboxstatus" {{isset($invcategoria)?$invcategoria->status=="ENABLED"?'checked':false:'checked'}}/>
    <label CLASS="toggle" for="status">Toggle</label>
</div>
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>