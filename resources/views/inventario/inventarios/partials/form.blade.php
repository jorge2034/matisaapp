<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {!! Form::label('inv_vehiculo_id', 'Vehiculo', ['class' => 'control-label'] )  !!}
            {!!  Form::select('inv_vehiculo_id', App\InvVehiculo::getArray(),  null, ['class' => 'form-control select2' ]) !!}
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {!! Form::label('inv_almacen_id', 'Almacen', ['class' => 'control-label'] )  !!}
            {!!  Form::select('inv_almacen_id', App\InvAlmacen::getArray(),  null, ['class' => 'form-control select2' ]) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('cantidad', 'Cantidad')}}
            {{Form::text('cantidad',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('year', 'Año')}}
            {{Form::text('year',null,['class'=>'form-control'])}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('precio_compra_bs', 'Precio Compra Bs')}}
            {{Form::text('precio_compra_bs',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('precio_venta_bs', 'Precio Venta Bs')}}
            {{Form::text('precio_venta_bs',null,['class'=>'form-control'])}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('precio_compra_sus', 'Precio Compra $US')}}
            {{Form::text('precio_compra_sus',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('precio_venta_sus', 'Precio Venta $US')}}
            {{Form::text('precio_venta_sus',null,['class'=>'form-control'])}}
        </div>
    </div>

    {{Form::hidden('company_id',\Auth::user()->company_id)}}
    <div class="form-group">
        {!! Form::label('status', 'Estado', ['class' => 'control-label'] )  !!}
        <input type="checkbox" id="status" name="status" class="checkboxstatus" {{isset($invInventarios)?$invInventarios->status=="ENABLED"?'checked':false:'checked'}}/>
        <label CLASS="toggle" for="status">Toggle</label>
    </div>
    <div class="form-group">
        {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary','id'=>'submit'])}}
    </div>
</div>
