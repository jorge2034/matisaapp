<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = ['company_id','nombre', 'ruta', 'mimetype','status'];

    public function getUrlPathAttribute()
    {
        return \Storage::url($this->ruta);
    }

    //relacion
    public function invmarca(){
        return $this->belongsTo('App\InvMarca','image_id');
    }
}
