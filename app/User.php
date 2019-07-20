<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Caffeinated\Shinobi\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Caffeinated\Shinobi\Models\Role[] $roles
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable,ShinobiTrait,SoftDeletes;

    const ENABLED = 'ENABLED', ENABLED_TXT = 'Activo';
    const DISABLED = 'DISABLED', DISABLED_TXT = 'Inactivo';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email','fullname', 'password','company_id','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getArrayStatus()
    {
        $estado = array(
            self::ENABLED => self::ENABLED_TXT,
            self::DISABLED => self::DISABLED_TXT,
        );
        return $estado;
    }

    public function scopeName($query,$name){
        if(trim($name)!=""){
            $query->where('name','LIKE',"%$name%");
        }
    }
    public function scopeLastname($query,$apellido){
        if(trim($apellido)!=""){
            $query->where('lastname','LIKE',"%$apellido%");
        }
    }
    public function scopeEmail($query,$email){
        if(trim($email)!=""){
            $query->where('email','LIKE',"%$email%");
        }
    }
    public function scopeStatus($query,$estado){
        if(trim($estado)!=""){
            $query->where('status','LIKE',"%$estado%");
        }
    }
}
