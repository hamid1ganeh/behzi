<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Enums\TicketSeenStatus;
use App\Enums\TicketStatus;
use App\Filters\User\TicketFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Models\TicketDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{

    public function index()
    {
        return view('user-panel.tickets.index');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'message' => 'کاربر لاگین نشده است'
            ],401);
        }


        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'department_id' => 'required|integer|exists:ticket_departments,id',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }


        $ticket = auth()->user()->tickets()->create([
            'title' => $request->get('title'),
            'department_id' => $request->get('department_id'),
            'status' => TicketStatus::WAITING_FOR_OPERATOR_RESPONSE,
            'seen' => TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_OPERATOR
        ]);

        return  response()->json(new TicketResource($ticket));
    }

    
    public function departments()
    {
        $departments = TicketDepartment::all();
        return response()->json($departments);
    }
    
    public function tickets(TicketFilter $ticketFilter)
    {
         $user = auth()->user();
        $tickets = $user->tickets()->filter($ticketFilter)->get();
        return response()->json(TicketResource::collection($tickets));
    }
}
