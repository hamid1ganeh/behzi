<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageConnection;
use App\Models\Phone;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PageConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Builder[]|Collection|JsonResponse
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->only([
            'page_id'
        ]), [
            'page_id' => 'required|integer|exists:pages,id'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'data' => [
                    'errors' => $validator->getMessageBag()
                ]
            ], 422);
        }

        $connections = PageConnection::where('page_id', $request->get('page_id'))
            ->orderBy('priority', 'ASC')->get();

        return $connections;
    }

    public function create(Page $page)
    {

        return view('user-panel.pages.connections.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only([
            'page_id',
            'title',
            'value',
            'type'
        ]), [
            'page_id' => 'required|integer|exists:pages,id',
            'title' => 'required|string',
            'value' => 'required|string',
            'type' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'data' => [
                    'errors' => $validator->getMessageBag()
                ]
            ], 422);
        }
        $connection = PageConnection::create($request->only([
            'page_id',
            'title',
            'value',
            'type'
        ]));

        if ($connection) {
            return response()->json([
                'message' => 'راه ارتباطی جدید با موفقیت اضافه شد',
                'status' => true,
                'data' => [
                    'connection' => $connection
                ]
            ]);
        }

        return response()->json([
            'message' => 'مشکلی بوجود آمده است! بعدا تلاش کنید',
            'status' => false,

        ]);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->only([
            'page_connection_id',
            'title',
            'value',
            'status',
        ]), [
            'page_connection_id' => 'required|integer|exists:page_connections,id',
            'title' => 'required|string',
            'value' => 'required|string',
            'status' => 'required|integer|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'data' => [
                    'errors' => $validator->getMessageBag()
                ]
            ], 422);
        }

        $connection = PageConnection::find($request->get('page_connection_id'));

        $connection->update($request->only([
            'title',
            'value',
            'status'
        ]));

        if ($connection) {
            return response()->json([
                'message' => 'بروزرسانی با موفقیت انجام شد',
                'status' => true,
                'data' => [
                    'connection' => $connection,
                    'connections' =>  PageConnection::wherePageId($connection->getPageId())->get(),

                ]
            ]);
        }

        return response()->json([
            'message' => 'مشکلی بوجود آمده است! بعدا تلاش کنید',
            'status' => false,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->only([
            'page_connection_id',
        ]), [
            'page_connection_id' => 'required|integer|exists:page_connections,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'data' => [
                    'errors' => $validator->getMessageBag()
                ]
            ], 422);
        }

        $connection = PageConnection::find($request->get('page_connection_id'));

        if ($connection->delete()) {
            return response()->json([
                'message' => 'با موفقیت حذف شد',
                'status' => true,
                'data' =>[
                    'connections' => PageConnection::wherePageId($connection->getPageId())->get(),
                ]
            ]);
        }

        return response()->json([
            'message' => 'مشکلی پیش آمده است! بعدا تلاش کنید',
            'status' => false
        ]);
    }


    public function sort(Request $request)
    {
        $validator = Validator::make($request->only([
            'page_id'
        ]), [
            'page_id' => 'required|integer|exists:pages,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'data' => [
                    'errors' => $validator->getMessageBag()
                ]
            ], 422);
        }

        $page = Page::findOrFail($request->get('page_id'));

        $connections = $request->connections;

        foreach ($connections as $connection) {
            $pageConnection = PageConnection::where('id', $connection['id']);
            $pageConnection->update(['priority' => $connection['priority']]);
        }

        $newPageConnections = $page->page_connections()->orderBy('priority', 'ASC')->get();

        return response()->json([
            'connections' => $newPageConnections
        ]);
    }
}
