<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class TicketMessage extends Model
{
    protected $fillable = [
        'ticket_id',
        'messagerable_id',
        'messagerable_type',
        'content',
    ];

    // relationships method

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function messageer()
    {
        return $this->morphTo('messagerable');
    }

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable');
    }

    // table property getter

    public function getId()
    {
        return $this->id;
    }

    public function getTicketId()
    {
        return $this->ticket_id;
    }

    public function getMessagerableId()
    {
        return $this->messagerable_id;
    }

    public function getMessagerableType()
    {
        return $this->messagerable_type;
    }

    public function getContent()
    {
        return $this->content;
    }

    //

    public function getPersianDate()
    {
        return Jalalian::forge($this->created_at)->format('%A, %d %B %Y');
    }

    public function getMessageType()
    {
        switch ($this->getMessagerableType()) {
            case Admin::class:
                return 'operator';
                break;
            case User::class:
                return 'user';
                break;
            default:
                return null;
        }
    }
}
