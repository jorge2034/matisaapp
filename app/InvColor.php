<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvColor extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    const ENABLED = 'ENABLED', ENABLED_TXT = 'Activo';
    const DISABLED = 'DISABLED', DISABLED_TXT = 'Inactivo';

    protected $table = 'inv_colores';

    protected $fillable = [
        'nombre','company_id', 'descripcion',
    ];



    //RELACIONES
    public function company(){
        return $this->belongsTo('App\Company','company_id');
    }

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
    public function scopeNombre($query,$name){
        if(trim($name)!=""){
            $query->where('nombre','LIKE',"%$name%");
        }
    }
    public function scopeDescripcion($query,$descripcion){
        if(trim($descripcion)!=""){
            $query->where('descripcion','LIKE',"%$descripcion%");
        }
    }
    public function scopeStatus($query,$estado){
        if(trim($estado)!=""){
            $query->where('status','LIKE',"%$estado%");
        }
    }
    public function scopeCompany($query,$company_id){
            if(trim($company_id)!=""){
                $query->where('company_id',$company_id);
            }
        }
}
