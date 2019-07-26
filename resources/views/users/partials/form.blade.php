<div class="form-group">
    {{Form::label('name', 'Nombre del Usuario')}}
    {{Form::text('name',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('lastname', 'Apellidos del Usuario')}}
    {{Form::text('lastname',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('email', 'Email del Usuario')}}
    {{Form::text('email',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('password', 'Contraseña del Usuario')}}
    {{Form::text('password',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {!! Form::label('company_id', 'Sucursal', ['class' => 'control-label'] )  !!}
    {!!  Form::select('company_id', App\Company::getArray(),  null, ['class' => 'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Estado', ['class' => 'control-label'] )  !!}
    <input type="checkbox" id="status" name="status" class="checkboxstatus" {{isset($user)?$user->status=="ENABLED"?'checked':false:'checked'}}/><label CLASS="toggle" for="status">Toggle</label>
</div>

<hr>
<h3>Lista de Roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($roles as $role)
            <li>
                {{Form::checkbox('roles[]',$role->id,null)}}
                <label>
                    {{$role->name}}
                    <em>({{$role->description??'Sin descripcion'}})</em>
                </label>
            </li>
        @endforeach
    </ul>
</div>
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>