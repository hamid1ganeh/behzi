<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class TenantMessage extends Model
{
    protected $table = 'tenant_messages';
    protected $fillable = [
        'page_id',
        'mobile',
        'email',
        'text',
    ];
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    public function getJalaliCreatedAtDate()
    {
        return Jalalian::forge($this->getCreatedAtDate())->format('%A, %d %B %Y');
    }

    public function getJalaliUpdatedAtDate()
    {
        return Jalalian::forge($this->getUpdatedAtDate())->format('%A, %d %B %Y');
    }
    public function getCreatedAtDate()
    {
        return $this->created_at;
    }

    public function getUpdatedAtDate()
    {
        return $this->updated_at;
    }
}
