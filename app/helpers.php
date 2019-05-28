<?php

function active($path,$opt=0){
        return request()->is($path)?'active':'';
}

function estado($status){
        return isset($status)=='ENABLED'?'Activo':'Inactivo';
}

?>