<?php


namespace App\Enums;


class TicketSeenStatus
{
    const WAITING_TO_BE_SEEN_BY_THE_USER = 1;
    const WAITING_TO_BE_SEEN_BY_THE_OPERATOR = 2;
    const SEEN_BY_THE_USER = 3;
    const SEEN_BY_THE_OPERATOR = 4;
}