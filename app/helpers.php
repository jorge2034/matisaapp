<?php

function active($path,$opt=0){
        return request()->is($path)?'active':'';
}

function estado($status){
        return $status=='ENABLED'?'<span class="badge badge-success">Activo</span>':'<span class="badge badge-danger">Inactivo</span>';
}

?>