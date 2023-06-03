<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Enums\TicketSeenStatus;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin-panel.tickets.index', compact('tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        if ($ticket->getSeen() == TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_OPERATOR) {
            $ticket->update([
                'seen' => TicketSeenStatus::SEEN_BY_THE_OPERATOR
            ]);
        }

        return view('admin-panel.tickets.show', compact('ticket'));
    }
}
