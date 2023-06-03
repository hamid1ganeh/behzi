<?php

namespace App\Models;

use App\Enums\PageStatus;
use App\Enums\TicketSeenStatus;
use App\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Model;
use Kyslik\LaravelFilterable\Filterable;
use Morilog\Jalali\Jalalian;

class Ticket extends Model
{
    use Filterable;

    protected $fillable = [
        'department_id',
        'page_id',
        'user_id',
        'title',
        'status',
        'seen'
    ];

    // relationships method

    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }

    public function department()
    {
        return $this->belongsTo(TicketDepartment::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // table property getter

    public function getId()
    {
        return $this->id;
    }

    public function getDepartmentId()
    {
        return $this->department_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getSeen()
    {
        return $this->seen;
    }

    //
    public function getLastMessage()
    {
        return $this->messages()->latest()->first();
    }

    //

    public function hasAnyMessage()
    {
        return $this->messages()->count() > 0;
    }

    public function isLastMessageOwnedByCurrentUser()
    {
        return auth()->user() == $this->getLastMessage()->messageer;
    }

    public function isTicketCreatedByCurrentUser()
    {
        return auth()->user() == $this->creator;
    }

    public function updateSeenStatus()
    {
        if ($this->getSeen() == TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_USER) {
            $this->update([
                'seen' => TicketSeenStatus::SEEN_BY_THE_USER
            ]);
        } else if ($this->getSeen() == TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_OPERATOR) {
            $this->update([
                'seen' => TicketSeenStatus::SEEN_BY_THE_OPERATOR
            ]);
        }
    }

    public function updateStatus()
    {
        if ($this->getSeen() == TicketSeenStatus::SEEN_BY_THE_OPERATOR) {
            if ($this->getStatus() == TicketStatus::WAITING_FOR_OPERATOR_RESPONSE) {

                $this->update([
                    'status' => TicketStatus::WAITING_FOR_USER_RESPONSE,
                    'seen' => TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_USER
                ]);

            }
        } else if ($this->getSeen() == TicketSeenStatus::SEEN_BY_THE_USER) {
            if ($this->getStatus() == TicketStatus::WAITING_FOR_USER_RESPONSE) {

                $this->update([
                    'status' => TicketStatus::WAITING_FOR_OPERATOR_RESPONSE,
                    'seen' => TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_OPERATOR
                ]);

            }
        }
    }
    public function getPersianDate()
    {
        return Jalalian::forge($this->created_at)->format('%A, %d %B %Y');
    }

    public function getTicketSeenStatus()
    {
        switch ($this->getSeen()) {
            case TicketSeenStatus::SEEN_BY_THE_OPERATOR:
                return [
                    'name' => trans('SEEN_BY_THE_OPERATOR'),
                    'title' => 'در حال بررسی',
                    'class' => 'label-light-primary'
                ];
                break;
            case TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_OPERATOR:
                return [
                    'name' => trans('WAITING_TO_BE_SEEN_BY_THE_OPERATOR'),
                    'title' => 'در انتظار پاسخ',
                    'class' => 'label-light-warning'
                ];
                break;
            case TicketSeenStatus::SEEN_BY_THE_USER:
                return [
                    'name' => trans('SEEN_BY_THE_USER'),
                    'class' => '',
                    'title' => '',
                ];
                break;
            case TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_USER:
                return [
                    'name' => trans('WAITING_TO_BE_SEEN_BY_THE_USER'),
                    'class' => 'label-light-success',
                    'title' => 'پیام جدید',
                ];
                break;
            default:
                return [

                ];
        }
    }

}
