<?php

namespace App\Models;

use App\Enums\PhoneStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    protected $fillable = ['name', 'number', 'status', 'priority', 'page_id'];

    use SoftDeletes;

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::creating(function($phone){
            $phone->priority = rand(0, 100);
            $phone->status = PhoneStatus::Active;
        });
    }

    // relationships method

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    // table property getter

    public function getId()
    {
        return $this->id;
    }

    public function getPageId()
    {
        return $this->page_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function getStatus()
    {
        return $this->status;
    }

}