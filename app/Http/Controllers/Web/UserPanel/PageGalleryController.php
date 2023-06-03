<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Enums\PageGalleryStatus;
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
     * @param Page $page
     * @return Application|Factory|View
     */
    public function index(Page $page)
    {
        $galleries = $page->page_galleries->load(['page_gallery_images']);
        return view('user-panel.pages.galleries.index', compact(['galleries', 'page']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Page $page
     * @return Application|Factory|View
     */
    public function create(Page $page)
    {
        return view('user-panel.pages.galleries.create', compact('page'));
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
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @param PageGallery $pageGallery
     * @return Application|Factory|View
     */
    public function edit(Page $page, PageGallery $pageGallery)
    {
        $pageGalleryImages = $pageGallery->page_gallery_images()->with('image')->orderBy('priority', 'ASC')->get();
        return view('user-panel.pages.galleries.edit', compact(['page', 'pageGallery', 'pageGalleryImages']));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @param PageGallery $pageGallery
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Page $page, PageGallery $pageGallery)
    {
        $pageGallery->delete();
        return back();
    }

    public function sort(Request $request, Page $page, PageGallery $pageGallery)
    {
        $galleryImages = $pageGallery->page_gallery_images()->with('image')->get();
        $images = $request->images;
        foreach ($galleryImages as $galleryImage) {
            foreach ($images as $image) {
                if ($image['id'] == $galleryImage->id) {
                    $galleryImage->update(['priority' => $image['priority']]);
                }

            }
        }
        $pageGalleryImages = $pageGallery->page_gallery_images()->with('image')->orderBy('priority', 'ASC')->get();
        return response()->json([
            'images' => $pageGalleryImages
        ]);
    }
}
