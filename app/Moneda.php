<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Moneda
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Moneda newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Moneda newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Moneda onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Moneda query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Moneda withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Moneda withoutTrashed()
 * @mixin \Eloquent
 */
class Moneda extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'simbolo','company_id'
    ];

    const ENABLED = 'ENABLED', ENABLED_TXT = 'Activo';
    const DISABLED = 'DISABLED', DISABLED_TXT = 'Inactivo';

    public static function getArray($bArray = true)
    {
        $result = self::where('status',self::ENABLED)->get();

        if($bArray){
            $array = array();
            foreach ($result as $value){
                $array[$value->id] = $value->name;
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
            return $object->name;
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
