<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SysCity extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    const ENABLED = 'ENABLED', ENABLED_TXT = 'Activo';
    const DISABLED = 'DISABLED', DISABLED_TXT = 'Inactivo';

    protected $fillable = [
        'contry_id','nombre', 'codigo','region_name','region_capital','status'
    ];

    protected $table = 'sys_city';

    public function contry(){
        return $this->belongsTo('App\SysContry','contry_id');
    }
    public static function getArrayStatus()
    {
        $estado = array(
            self::ENABLED => self::ENABLED_TXT,
            self::DISABLED => self::DISABLED_TXT,
        );
        return $estado;
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
}
