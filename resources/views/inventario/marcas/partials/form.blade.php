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
{{Form::hidden('company_id',\Auth::user()->company_id)}}
<div class="form-group">
    {!! Form::label('status', 'Estado', ['class' => 'control-label'] )  !!}
    <input type="checkbox" id="status" name="status" class="checkboxstatus" {{isset($invmarca)?$invmarca->status=="ENABLED"?'checked':false:'checked'}}/>
    <label CLASS="toggle" for="status">Toggle</label>
</div>
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary','id'=>'submit'])}}
</div>