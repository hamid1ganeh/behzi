<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserType
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserType whereStatus($value)
 * @mixin \Eloquent
 */
class UserType extends Model
{
    protected $table = 'user_types';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'status'
    ];
}
