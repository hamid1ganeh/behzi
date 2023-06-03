<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketDepartment extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];

    // relationships method

    public function operators()
    {
        return $this->belongsToMany(Admin::class, 'ticket_operators', 'department_id','admin_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'department_id');
    }

    // table property getter

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    // computational getter methods

    public function getNumberOfTickets()
    {
        return $this->tickets()->count();
    }

    public function getNumberOfOperators()
    {
        return $this->operators()->count();
    }
}