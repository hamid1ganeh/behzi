<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Enums\AttachmentType;
use App\Enums\TicketSeenStatus;
use App\Enums\TicketStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Validator;

class TicketMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Ticket $ticket
     * @return mixed
     */
    public function index(Ticket $ticket)
    {
        if ($ticket->getSeen() == TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_USER) {
            $ticket->update([
                'seen' => TicketSeenStatus::SEEN_BY_THE_USER
            ]);
        }

        return response()->json(MessageResource::collection($ticket->messages));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Ticket $ticket
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(Request $request, Ticket $ticket)
    {
        if (!auth()->check()) {
            return response()->json([
                'message' => 'کاربر لاگین نشده است',
                'status' => false
            ]);
        }


        $validator = Validator::make($request->all(), [
            'content' => [
                'required',
                'string'
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $message = auth()->user()->messages()->create([
            'ticket_id' => $ticket->getId(),
            'content' => $request->get('content')
        ]);

        $ticket->update([
            'status' => TicketStatus::WAITING_FOR_OPERATOR_RESPONSE,
            'seen' => TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_OPERATOR
        ]);

        return response()->json([
            'message' => 'پیام با موفقیت ارسال شد',
            'status' => true,
            'data' => ['message' => $message]
        ]);
    }

    public function sendFileTester()
    {
        return view('send-file-tester');
    }

    public function sendFile(Request $request, Ticket $ticket)
    {


        $validator = Validator::make($request->all(), [
            'file' => [
                'required',
                'file',
                'max:5000',
                'mimes:pdf,png,doc,txt'
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $storage = Storage::disk('public');

        if (!$storage->exists('tickets/attachments/')) {
            $storage->makeDirectory('tickets/attachments/');
        }

        $file = $request->file('file');

        $fileExtension = $file->getClientOriginalExtension();
        $fileName = Str::random(10);
        $fileFUllName = $fileName . '.' . $fileExtension;
        $res = $storage->putFileAs('tickets/attachments', $request->file('file'), $fileFUllName);

        $message = auth()->user()->messages()->create([
            'ticket_id' => $ticket->getId(),
            'content' => asset('storage/' . $res)
        ]);

        $ticket->update([
            'status' => TicketStatus::WAITING_FOR_OPERATOR_RESPONSE,
            'seen' => TicketSeenStatus::WAITING_TO_BE_SEEN_BY_THE_OPERATOR
        ]);

        $mimetypeMap = [
            'image/png' => AttachmentType::IMAGE_PNG,
            'text/plain' => AttachmentType::TEXT_PLAIN,
            'application/pdf' => AttachmentType::APPLICATION_PDF,
            'application/msword' => AttachmentType::APPLICATION_MSWORD,
        ];


        $message->attachment()->create([
            'path' => $res,
            'type' => $mimetypeMap[$request->file('file')->getMimeType()]
        ]);

        return response()->json([
            'message' => 'پیام با موفقیت ارسال شد',
            'status' => true,
            'data' => ['message' => $message]
        ]);
    }
}
