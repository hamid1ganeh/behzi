<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\PageUser
 *
 * @property int $page_id
 * @property int $user_id
 * @property int $user_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserType $user_type_model
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageUser wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageUser whereUserType($value)
 * @mixin \Eloquent
 */
class PageUser extends Pivot
{
    protected $table = "page_user";
    protected $fillable = [
        'page_id',
        'user_id',
        'user_type'
    ];
    public function user_type_model(){
        return $this->belongsTo(UserType::class,'user_type');
    }
}
