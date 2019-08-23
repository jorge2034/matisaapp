<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;

class Archivo extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    const ENABLED = 'ENABLED', ENABLED_TXT = 'Activo';
    const DISABLED = 'DISABLED', DISABLED_TXT = 'Inactivo';
    protected $fillable = ['company_id','nombre', 'ruta', 'mimetype','status'];

    public function getUrlPathAttribute()
    {
        return \Storage::url($this->ruta);
    }

    public static function uploadMultipleFile($arrayimagenes){
        $arrayIds = array();
        foreach($arrayimagenes as $file){
            $imagen = Archivo::create([
                'company_id'=>\Auth::user()->company_id,
                'nombre'=>$file->getClientOriginalName(),
                'ruta'=>$file->store('public/storage'),
                'mimetype'=>$file->getClientOriginalExtension(),
                'status'=>Archivo::ENABLED
            ]);
            array_push($arrayIds,$imagen->id);
        }

        return $arrayIds;
    }

    public static function getArchivo($arrayids){
        $result = self::find($arrayids);
        return $result;
    }

}
