<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SysContry extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre', 'codigo','status'
    ];
    protected $table = 'sys_contry';

    const ENABLED = 'ENABLED', ENABLED_TXT = 'Activo';
    const DISABLED = 'DISABLED', DISABLED_TXT = 'Inactivo';
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

}
