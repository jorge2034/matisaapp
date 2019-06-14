<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvCategoria extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    const ENABLED = 'ENABLED', ENABLED_TXT = 'Activo';
    const DISABLED = 'DISABLED', DISABLED_TXT = 'Inactivo';
    protected $fillable = [
        'nombre', 'descripcion', 'color'
    ];

    public static function getArrayStatus()
    {
        $estado = array(
            self::ENABLED => self::ENABLED_TXT,
            self::DISABLED => self::DISABLED_TXT,
        );
        return $estado;
    }
}
