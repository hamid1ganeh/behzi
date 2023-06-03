<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Enums\PageAddressStatus;
use App\Enums\PageLevel;
use App\Enums\PageStatus;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Page;
use App\Models\Province;
use App\Models\WorkItem;
use App\Services\V1\ImageService;
use App\Services\V1\PageService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PageController extends Controller
{

    private $pageService;
    private $imageService;

    public function __construct(PageService $pageService, ImageService $imageService)
    {
        $this->pageService = $pageService;
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {

        $user = auth()->user();

        $pages = $user->pages()->with('work_item.work_category')->paginate(\config('globalvariable.paginateLimit'));

        return view('user-panel.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        if(Page::isTheLastPageAwaitingApproval()) {
            alert()->error('شما در حال حاضر یک صفحه در انتظار تایید دارید')->confirmButton('فهمیدم');
            return redirect()->route('userPanel.pages.index');
        }

        $workItems = WorkItem::with('work_category')->get();
        $cities = City::with('province')->get();
        return view('user-panel.pages.create', compact(['workItems', 'cities']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request)
    {

        if (!auth()->check()) {
            return back();
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'work_item_id' => 'required|integer|exists:work_items,id',
            'address' => 'required|string|max:500',
            'description' => 'nullable',
            'city_id' => 'required|integer|exists:cities,id',
            'lat' => 'required|string',
            'lng' => 'required|string',
            'updated_image' => 'required|base64image|base64max:10000|base64dimensions:min_width=300,min_height=300|base64mimetypes:image/jpeg,image/png'

        ]);

        $authenticatedUser = auth()->user();
        $numberOfExistingActivePages = $authenticatedUser->pages->where('status', PageStatus::Active)->count();
        $numberOfAllPages = $authenticatedUser->pages->count();

        $hasPermissionToSubmitNew = $numberOfExistingActivePages === $numberOfAllPages;


        if (!$hasPermissionToSubmitNew) {
            return back();
        }

        $incomingPageData = $request->only([
            'work_item_id',
            'name',
            'description',
        ]);

        $additionalPageData = [
            'code' => rand(100, 1000),
            'start_date' => now(),
            'expire_date' => now()->addYear(),
            'level' => PageLevel::Simple,
            'status' => PageStatus::Pending,
        ];


        $pageData = array_merge($incomingPageData, $additionalPageData);

        $page = Page::create($pageData);

        $owner = auth()->user();
        $page->setOwner($owner);

        $incomingPageAddressData = $request->only([
            'city_id',
            'address',
            'lat',
            'lng'
        ]);


        $additionalPageAddressData = [
            'status' => PageAddressStatus::Approved
        ];

        $pageAddressData = array_merge($incomingPageAddressData, $additionalPageAddressData);

        $page->address()->create($pageAddressData);

        if ($request->has('updated_image')) {
            $this->pageService->storePageImage($page, $request->get('updated_image'));
        }

        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Application|Factory|View
     */
    public function edit(Page $page)
    {
        $workItems = WorkItem::with('work_category')->get();
        $cities = City::with('province')->get();
        $page = $page->load('address');
        return view('user-panel.pages.edit', compact(['page', 'workItems', 'cities']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(Request $request, Page $page)
    {

        $request->validate([
            "name" => "required|string|max:100",
            "work_item_id" => "required|integer|exists:work_items,id",
            "address" => "required|string|max:500",
            "city_id" => "required|integer|exists:cities,id",
            "lat" => "required|string",
            "lng" => "required|string",
            'updated_image' => 'nullable|base64image|base64max:10000|base64dimensions:min_width=300,min_height=300|base64mimetypes:image/jpeg,image/png'

        ]);


        $incomingPageData = $request->only([
            'work_item_id',
            'name',
            'description',
        ]);


        $page->update($incomingPageData);

        $incomingPageAddressData = $request->only([
            'city_id',
            'address'
        ]);

        if ($request->has('location')) {
            $incomingPageAddressData = array_merge($incomingPageAddressData, $request->only(['lat', 'lng']));
        }

        $additionalPageAddressData = [
            'status' => PageAddressStatus::Approved
        ];

        $pageAddressData = array_merge($incomingPageAddressData, $additionalPageAddressData);
        $page->address()->update($pageAddressData);

        if ($request->has('updated_image')) {
            $this->pageService->updatePageImage($page, $request->get('updated_image'));
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return back();
    }

    public function store_step_1_validator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'work_item_id' => 'required|integer|exists:work_items,id',
            'description' => 'required|nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'data' => [
                    'errors' => $validator->getMessageBag()
                ]
            ]);
        }

        return response()->json([
            'message' => 'داده های وارد شده معتبر است',
            'status' => true
        ]);
    }

    public function store_step_2_validator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'original_image' => 'required|base64image',
            'updated_image' => 'required|base64image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'data' => [
                    'errors' => $validator->getMessageBag()
                ]
            ]);
        }

        return response()->json([
            'message' => 'داده های وارد شده معتبر است',
            'status' => true
        ]);
    }



    public function store_step(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'work_item_id' => 'required|integer|exists:work_items,id',
            'description' => 'nullable|string|max:1000',
            'original_image' => 'required|base64image',
            'updated_image' => 'required|base64image',
            'city_id' => 'required|integer|exists:cities,id',
            'address' => 'required|string|max:180',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'خطاهای نشان داده شده را برطرف کنید',
                'status' => false,
                'data' => [
                    'errors' => $validator->getMessageBag()
                ]
            ]);
        }

        $data = $request->only([
            'name',
            'work_item_id',
            'description',
        ]);

        $data = array_merge($data, [
            'code' => Str::random(5),
            'level' => PageLevel::Simple,
            'status' => PageStatus::Pending,
            'start_date' => now(),
            'expire_date' => now()->addMonth()
        ]);

        $page = Page::create($data);

        $page->setOwner(auth()->user());

        $page->address()->create($request->only([
            'city_id',
            'address',
            'lat',
            'lng'
        ]));

        $pageService = new PageService();

        $pageService->storePageImage($page, $request->get('updated_image'));


        return response()->json([
            'message' => 'صفحه با موفقیت ساخته شد',
            'status' => true,
            'page' => $page,
            'nextUrl'=>route('userPanel.pages.show',$page)
        ]);

    }


    public function basicDataUpdate(Request $request, Page $page)
    {

        $request->validate([
            'name' => 'required|string|max:100',
            'work_item_id' => 'required|integer|exists:work_items,id',
            'description' => 'nullable|string|max:1000',
            ]);

        $data = $request->only([
            'name',
            'work_item_id',
            'description',
        ]);

        $page->update($data);


        return response()->json([
            'message' => 'بروزرسانی اطلاعات با موفقیت انجام شد',
            'status' => true,
            'page' => $page,
        ]);
    }

    public function imageDataUpdate(Request $request, Page $page)
    {

        $request->validate([
            'original_image' => 'required|base64image',
            'updated_image' => 'required|base64image'
        ]);

        $pageService = new PageService();

        $pageService->updatePageImage($page, $request->get('updated_image'));


        return response()->json([
            'message' => 'بروزرسانی تصویر با موفقیت انجام شد',
            'status' => true,
            'page' => $page,
        ]);
    }

    public function addressDataUpdate(Request $request, Page $page)
    {
        $request->validate([
            'city_id' => 'required|integer|exists:cities,id',
            'address' => 'required|string|max:180',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $page->address()->update($request->only([
            'city_id',
            'address',
            'lat',
            'lng'
        ]));

        return response()->json([
            'message' => 'بروزرسانی اطلاعات آدرس با موفقیت انجام شد',
            'status' => true,
            'page' => $page,
        ]);
    }

    public function show(Page $page){

        $page = $page->load('domain.detail');
//        dd($page->toArray());
        return view('user-panel.pages.show',compact('page'));
    }
}
