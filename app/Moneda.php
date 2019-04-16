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
}
