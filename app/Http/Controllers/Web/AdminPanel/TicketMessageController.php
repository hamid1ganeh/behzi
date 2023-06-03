<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Enums\TicketSeenStatus;
use App\Enums\TicketStatus;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;

class TicketMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ticket $ticket)
    {
        if (!auth()->guard('admin')->check()) {
            return response()->json([
                'message' => 'کاربر لاگین نشده است'
            ]);
        }

        $validator = \Validator::make($request->all(), [
            'content' => [
                'required',
                'string'
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $content = $request->get('content');
        $user = auth()->guard('admin')->user();


        $message = new TicketMessage();
        $message->content = $content;
        $message->ticket_id = $ticket->getId();
        $user->messages()->save($message);


        $ticket->update([
            'status' => TicketStatus::WAITING_FOR_USER_RESPONSE,
            'seen' => TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_USER
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketMessage  $ticketMessage
     * @return \Illuminate\Http\Response
     */
    public function show(TicketMessage $ticketMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketMessage  $ticketMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketMessage $ticketMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketMessage  $ticketMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketMessage $ticketMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketMessage  $ticketMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketMessage $ticketMessage)
    {
        //
    }
}
