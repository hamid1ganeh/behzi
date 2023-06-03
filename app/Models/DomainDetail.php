<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomainDetail extends Model
{
    protected $table = 'domain_detail';
    protected $fillable = [
        'domain_id',
        'title',
        'aboutUs',
        'privacyPolicy',
        'status',
    ];
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
