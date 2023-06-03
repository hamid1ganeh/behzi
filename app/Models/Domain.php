<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Domain
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereUserId($value)
 * @mixin \Eloquent
 */
class Domain extends Model
{
    protected $table = 'domains';

    protected $fillable = [
        'user_id',
        'page_id',
        'name',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    public function detail()
    {
        return $this->hasOne(DomainDetail::class);
    }
}
