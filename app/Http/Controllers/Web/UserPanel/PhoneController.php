<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Phone;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
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

        $phones = Phone::where('page_id', $request->get('page_id'))
            ->orderBy('priority', 'ASC')->get();

        return $phones;
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
            'name',
            'number'
        ]), [
            'page_id' => 'required|integer|exists:pages,id',
            'name' => 'required|string',
            'number' => 'required|string'
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

        $phone = Phone::create($request->only([
            'page_id',
            'name',
            'number'
        ]));

        if ($phone) {
            return response()->json([
                'message' => 'تلفن جدید با موفقیت اضافه شد',
                'status' => true,
                'data' => [
                    'phone' => $phone
                ]
            ]);
        }

        return response()->json([
            'message' => 'مشکلی بوجود آمده است! بعدا تلاش کنید',
            'status' => false,

        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->only([
            'phone_id',
            'name',
            'number',
            'status',
            'priority'
        ]), [
            'phone_id' => 'required|integer|exists:phones,id',
            'name' => 'required|string',
            'number' => 'required|string',
            'status' => 'required|integer|in:1,2,3',
            'priority' => 'required|integer'
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

        $phone = Phone::find($request->get('phone_id'));

        $phone->update($request->only([
            'name',
            'number',
            'status',
            'priority'
        ]));

        if ($phone) {
            return response()->json([
                'message' => 'بروزرسانی با موفقیت انجام شد',
                'status' => true,
                'data' => [
                    'phone' => $phone,
                    'phones' => Phone::wherePageId($phone->getPageId())->get()
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
     * @return JsonResponse|Response
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->only([
            'phone_id',
        ]), [
            'phone_id' => 'required|integer|exists:phones,id',
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

        $phone = Phone::find($request->get('phone_id'));

        if ($phone->delete()) {
            return response()->json([
                'message' => 'با موفقیت حذف شد',
                'status' => true,
                'data' => [
                    'phones' => Phone::wherePageId($phone->getPageId())->get()
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

        $phones = $request->phones;

        foreach ($phones as $phone) {
            $pagePhone = Phone::where('id', $phone['id']);
            $pagePhone->update(['priority' => $phone['priority']]);
        }

        $newPagePhones = $page->phones()->orderBy('priority', 'ASC')->get();

        return response()->json([
            'phones' => $newPagePhones
        ]);
    }
}
