<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Enums\PageWorkTimeStatus;
use App\Enums\PageAddressStatus;
use App\Enums\PageStatus;
use App\Filters\Admin\PageFilter;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageWorkTime;
use App\Models\Province;
use App\Models\User;
use App\Models\WorkItem;
use App\Services\V1\ImageService;
use App\Services\V1\PageService;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Storage;

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
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $pageFilter = new PageFilter($request);

        $this->bulkOperation($request);

        $pages = Page::with('users')->withTrashed()->orderBy('updated_at', 'desc')->filter($pageFilter)->paginate(10);

        return view('admin-panel.pages.index', compact([
            'pages'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $workItems = WorkItem::with('work_category')->get();
        $provinces = Province::with('cities')->get();
        $users = User::all();
        return view('admin-panel.pages.create', compact(['workItems', 'provinces', 'users']));
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
        $request->validate([
            'name' => 'required|string|max:100',
            'work_item_id' => 'required|integer|exists:work_items,id',
            'address' => 'required|string|max:500',
            'city_id' => 'required|integer|exists:cities,id',
            'user_id' => 'required|integer|exists:users,id',
            'lat' => 'required|string',
            'lng' => 'required|string',
            'start_date' => 'required|integer',
            'expire_date' => 'required|integer',
            'updated_image' => 'required|base64image|base64max:10000|base64dimensions:min_width=300,min_height=300|base64mimetypes:image/jpeg,image/png'
        ]);


        $incomingPageData = $request->only([
            'work_item_id',
            'name',
            'description',
            'level',
            'status',
            'user_id'
        ]);

        $additionalPageData = [
            'code' => rand(100, 1000),
            'start_date' => ($request->start_date) / 1000,
            'expire_date' => ($request->expire_date) / 1000,
        ];

        $pageData = array_merge($incomingPageData, $additionalPageData);


        $page = Page::create($pageData);

        $owner = User::findOrFail($request->get('user_id'));
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

        if($request->has('updated_image')) {
            $this->pageService->storePageImage($page, $request->get('updated_image'));
        }


        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Factory|View
     */
    public function edit(Page $page)
    {
        $workItems = WorkItem::with('work_category')->get();
        $provinces = Province::with('cities')->get();
        $users = User::all();
        $page = $page->load(['address', 'users']);
        return view('admin-panel.pages.edit', compact(['page', 'workItems', 'provinces', 'users']));
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
            'name' => 'required|string|max:100',
            'work_item_id' => 'required|integer|exists:work_items,id',
            'level' => 'required',
            'status' => 'required',
            'address' => 'required|string|max:500',
            'city_id' => 'required|integer|exists:cities,id',
            'user_id' => 'required|integer|exists:users,id',
            'lat' => 'required|string',
            'lng' => 'required|string',
            'start_date' => 'required|integer',
            'expire_date' => 'required|integer',
            'updated_image' => 'nullable|base64image|base64max:10000|base64dimensions:min_width=300,min_height=300|base64mimetypes:image/jpeg,image/png'
        ]);

        $incomingPageData = $request->only([
            'work_item_id',
            'code',
            'name',
            'description',
            'level',
            'status',
            'user_id',
        ]);


//        $additionalPageData = [
//            'start_date' => ($request->start_date) / 1000,
//            'expire_date' => ($request->expire_date) / 1000,
//        ];

//        $pageData = array_merge($incomingPageData, $additionalPageData);

        $page->update($incomingPageData);


        $user = User::findOrFail($request->get('user_id'));

        if ($page->getOwner()->getId() !== $user->getId()) {
            $page->setOwner($user);
        }

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

        if($request->has('updated_image')) {
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

    public function recycle(Page $page)
    {
        $page->restore();
        return back();
    }

    private function bulkOperation(Request $request)
    {
        if ($request->has('bulk_operation_item_select')) {
            $action = $request->get('action');
            $targetGalleriesId = $request->get('bulk_operation_item_select');

            if ($action == 0) {
                Page::whereIn('id', $targetGalleriesId)->update([
                    'status' => PageStatus::Active
                ]);
            } else if ($action == 1) {
                Page::whereIn('id', $targetGalleriesId)->update([
                    'status' => PageStatus::Inactive
                ]);
            } else if ($action == 2) {
                Page::whereIn('id', $targetGalleriesId)->update([
                    'status' => PageStatus::Pending
                ]);
            } else if ($action == 3) {
                Page::whereIn('id', $targetGalleriesId)->update([
                    'status' => PageStatus::Ban
                ]);
            } else if ($action == 4) {
                Page::whereIn('id', $targetGalleriesId)->delete();
            } else if ($action == 5) {
                Page::whereIn('id', $targetGalleriesId)->restore();
            }
        }
    }
}
