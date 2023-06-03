<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Enums\PageGalleryStatus;
use App\Filters\Admin\PageGalleryFilter;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageGallery;
use App\Models\PageGalleryImage;
use App\Services\V1\PageGalleryService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PageGalleryController extends Controller
{

    private $pageGalleryService;

    public function __construct(PageGalleryService $pageGalleryService)
    {
        $this->pageGalleryService = $pageGalleryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $pageGalleryFilter = new PageGalleryFilter($request);

        $this->bulkOperation($request);

        $galleries = PageGallery::withTrashed()->orderBy('updated_at', 'desc')->filter($pageGalleryFilter)->paginate(10);
        $pages = Page::all();
        return view('admin-panel.galleries.index', compact([
            'galleries',
            'pages'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Page $page
     * @return Application|Factory|View
     */
    public function create(Page $page)
    {
        return view('admin-panel.pages.galleries.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @return RedirectResponse
     */
    public function store(Request $request, Page $page)
    {
        $request->validate([
            "name" => "required|string|max:100",
        ]);


        $pageGallery = $this->pageGalleryService->create($request);

        $page->page_galleries()->save($pageGallery);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param PageGallery $pageGallery
     * @return void
     */
    public function show(PageGallery $pageGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @param PageGallery $pageGallery
     * @return Application|Factory|View
     */
    public function edit(Page $page, PageGallery $pageGallery)
    {
        $pageGalleryImages = $pageGallery->page_gallery_images()->with('image')->orderBy('priority', 'ASC')->get();
        return view('admin-panel.pages.galleries.edit', compact(['page', 'pageGallery', 'pageGalleryImages']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PageGallery $pageGallery
     * @return Response
     */
    public function update(Request $request, PageGallery $pageGallery)
    {
        $pageGallery->update($request->only(['name', 'status']));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PageGallery $pageGallery
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(PageGallery $pageGallery)
    {
        $pageGallery->delete();
        return back();
    }

    public function recycle(PageGallery $pageGallery)
    {
        $pageGallery->restore();
        return back();
    }

    public function sort(Request $request, PageGallery $pageGallery)
    {
//        dd($request->toArray());
        $galleryImages = $pageGallery->page_gallery_images()->get();
        $images = $request->images;
        foreach ($galleryImages as $galleryImage) {
            foreach ($images as $image) {
                if ($image['id'] == $galleryImage->id) {
                    $galleryImage->update(['priority' => $image['priority']]);
                }

            }
        }
        $pageGalleryImages = $pageGallery->images()->orderBy('priority', 'ASC')->get();
        return response()->json([
            'images' => $pageGalleryImages
        ]);
    }

    /**
     * @param Request $request
     */
    public function bulkOperation(Request $request)
    {
        if ($request->has('bulk_operation_item_select')) {
            $action = $request->get('action');
            $targetGalleriesId = $request->get('bulk_operation_item_select');

            if ($action == 0) {
                PageGallery::whereIn('id', $targetGalleriesId)->update([
                    'status' => PageGalleryStatus::Approved
                ]);
            } else if ($action == 1) {
                PageGallery::whereIn('id', $targetGalleriesId)->update([
                    'status' => PageGalleryStatus::Pending
                ]);
            } else if ($action == 2) {
                PageGallery::whereIn('id', $targetGalleriesId)->update([
                    'status' => PageGalleryStatus::Ban
                ]);
            } else if ($action == 3) {
                PageGallery::whereIn('id', $targetGalleriesId)->delete();
            } else if ($action == 4) {
                PageGallery::whereIn('id', $targetGalleriesId)->restore();
            }
        }
    }
}
