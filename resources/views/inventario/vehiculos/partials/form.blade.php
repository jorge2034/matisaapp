<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {!! Form::label('inv_marca_id', 'Marca', ['class' => 'control-label'] )  !!}
            {!!  Form::select('inv_marca_id', App\InvMarca::getArray(),  null, ['class' => 'form-control select2' ]) !!}
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {!! Form::label('inv_categoria_id', 'Categoria', ['class' => 'control-label'] )  !!}
            {!!  Form::select('inv_categoria_id', App\InvCategoria::getArray(),  null, ['class' => 'form-control select2' ]) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('modelo', 'Modelo')}}
            {{Form::text('modelo',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('transmision', 'Transmisión')}}
            {{Form::text('transmision',null,['class'=>'form-control'])}}
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('cilindrada', 'Cilindrada')}}
            {{Form::text('cilindrada',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group form-group col-md-6 col-sm-6 col-xs-6">
            {{Form::label('tipo_combustible', 'Tipo de Combustible')}}
            {{Form::text('tipo_combustible',null,['class'=>'form-control'])}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
            {{Form::label('images', 'Imagenes')}}
            {{Form::file('images[]',['multiple'=>true,'class'=>'form-control'])}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8 col-sm-8 col-xs-8">
            {{Form::label('info_extra', 'Información extra')}}
            {{Form::textarea('info_extra',null,['class'=>'form-control summernote'])}}
        </div>
        <?php
        if(isset($invVehiculos)){
            $idsImage = json_decode($invVehiculos->imagenes);
            $imagenes = \App\Archivo::getArchivo($idsImage);
            $cont = 0;
            ?>
        <div class="form-group col-md-4 col-sm-4 col-xs-4">
        {{Form::label('carouselExampleIndicators', 'Slide de Imagenes')}}
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner text-center">

                <?php
                        foreach($imagenes as $imagen){
                            $active = $cont==0?'active':'';
                            echo '
                             <div class="carousel-item '.$active.'">
                                 <img class="d-block w-100" src="'.$imagen->url_path.'" alt="First slide">
                             </div>
                            ';
                            $cont++;
                        }
                    }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
            </div>
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Estado', ['class' => 'control-label'] )  !!}
        <input type="checkbox" id="status" name="status" class="checkboxstatus" {{isset($invVehiculos)?$invVehiculos->status=="ENABLED"?'checked':false:'checked'}}/>
        <label CLASS="toggle" for="status">Toggle</label>
    </div>
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary','id'=>'submit'])}}
</div>
</div>

