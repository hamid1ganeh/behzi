<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'attachmentable_id',
        'attachmentable_type',
        'type',
        'path',
    ];

    //

    public function getId()
    {
        return $this->id;
    }

    public function getAttachmentableId()
    {
        return $this->attachmentable_id;
    }

    public function getAttachmentableType()
    {
        return $this->attachmentable_type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPath()
    {
        return $this->path;
    }

    //

    public function attachmentable()
    {
        return $this->morphTo();
    }

}
