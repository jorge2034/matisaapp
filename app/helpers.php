<?php

function active($path,$opt=0){
        return request()->is($path)?'active':'';
}

?>