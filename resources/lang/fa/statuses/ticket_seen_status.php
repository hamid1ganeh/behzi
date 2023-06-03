<?php


use App\Enums\TicketSeenStatus;

return [
    TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_USER => 'در انتظار مشاهده توسط کاربر',
    TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_OPERATOR => 'در انتظار مشاهده توسط اپراتور',
    TicketSeenStatus::SEEN_BY_THE_USER => 'دیده شده توسط کاربر',
    TicketSeenStatus::SEEN_BY_THE_OPERATOR => 'دیده شده توسط اپراتور',
];