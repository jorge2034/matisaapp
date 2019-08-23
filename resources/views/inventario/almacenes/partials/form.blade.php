<div class="form-group">
    {{Form::label('nombre', 'Nombre')}}
    {{Form::text('nombre',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('descripcion', 'Descripción')}}
    {{Form::text('descripcion',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('direccion', 'Dirección')}}
    {{Form::text('direccion',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('telefono', 'Telefono')}}
    {{Form::text('telefono',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {!! Form::label('city_id', 'Ciudad', ['class' => 'control-label'] )  !!}
    {!!  Form::select('city_id', App\SysCity::getArray(),  null, ['class' => 'form-control select2' ]) !!}
</div>
{{Form::hidden('company_id',\Auth::user()->company_id)}}
<div class="form-group">
    {!! Form::label('status', 'Estado', ['class' => 'control-label'] )  !!}
    <input type="checkbox" id="status" name="status" class="checkboxstatus" {{isset($invAlmacenes)?$invAlmacenes->status=="ENABLED"?'checked':false:'checked'}}/>
    <label CLASS="toggle" for="status">Toggle</label>
</div>
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary','id'=>'submit'])}}
</div>