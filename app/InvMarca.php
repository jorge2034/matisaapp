<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvMarca extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    const ENABLED = 'ENABLED', ENABLED_TXT = 'Activo';
    const DISABLED = 'DISABLED', DISABLED_TXT = 'Inactivo';
    protected $fillable = [
        'nombre','company_id', 'descripcion', 'archivo_id'
    ];


    //RELACIONES
    public function company(){
        return $this->belongsTo('App\Company','company_id');
    }
    public function archivos(){
        return $this->belongsTo('App\Archivo','archivo_id');
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
}
