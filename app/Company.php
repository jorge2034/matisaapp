<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    const ENABLED = 'ENABLED', ENABLED_TXT = 'Activo';
    const DISABLED = 'DISABLED', DISABLED_TXT = 'Inactivo';
    protected $fillable = [
        'nombre', 'descripcion', 'direccion1','telefono1','status'
    ];

    //relaciones
    public static function getArray($bArray = true)
    {
        $result = self::where('status',self::ENABLED)->get();

        if($bArray){
            $array = array();
            foreach ($result as $value){
                $array[$value->id] = $value->nombre;
            }
            return $array;
        }
        return $result;
    }
    public static function getNameForList($object)
    {
        if(is_numeric($object)){
            $object = self::find($object);
        }
        if(is_object($object)){
            return $object->nombre;
        }
        return false;
    }
    public static function getArrayStatus()
    {
            $estado = array(
                self::ENABLED => self::ENABLED_TXT,
                self::DISABLED => self::DISABLED_TXT,
            );
        return $estado;
    }

    public function scopeNombre($query,$nombre){
        if(trim($nombre)!=""){
            $query->where('nombre','LIKE',"%$nombre%");
        }
    }
    public function scopeDireccion($query,$direccion){
        if(trim($direccion)!=""){
            $query->where('direccion1','LIKE',"%$direccion%");
        }
    }
    public function scopeTelefono($query,$telefono){
        if(trim($telefono)!=""){
            $query->where('telefono1','LIKE',"%$telefono%");
        }
    }
    public function scopeStatus($query,$estado){
        if(trim($estado)!=""){
            $query->where('status','LIKE',"%$estado%");
        }
    }
}
