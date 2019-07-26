<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvVehiculo extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    const ENABLED = 'ENABLED', ENABLED_TXT = 'Activo';
    const DISABLED = 'DISABLED', DISABLED_TXT = 'Inactivo';
    protected $fillable = [
        'num_kardex',
        'modelo',
        'company_id',
        'info_extra',
        'inv_marca_id',
        'inv_categoria_id',
        'inv_almacen_id',
        'year',
        'color',
        'precio_compra',
        'precio_venta',
        'precio_compra_sus',
        'precio_venta_sus',
        'num_motor',
        'num_chasis',
        'transmision',
        'cilindrada',
        'archivo_id',
        'imagenes',
        'tipo_combustible',
        'status'
    ];


    //RELACIONES
    public function company(){
        return $this->belongsTo('App\Company','company_id');
    }
    public function marca(){
        return $this->belongsTo('App\InvMarca','inv_marca_id');
    }
    public function categoria(){
        return $this->belongsTo('App\InvCategoria','inv_categoria_id');
    }
    public function almacen(){
        return $this->belongsTo('App\InvAlmacen','inv_almacen_id');
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
    public function scopeModelo($query,$name){
        if(trim($name)!=""){
            $query->where('modelo','LIKE',"%$name%");
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
