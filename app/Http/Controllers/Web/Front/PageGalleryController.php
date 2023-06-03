<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageGallery;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @param PageGallery $pageGallery
     * @return Factory|View
     */
    public function show(Page $page, PageGallery $pageGallery)
    {
        $images = $pageGallery->page_gallery_images()->approvedStatus()->paginate(4);

        // SEO
        $title = 'بهزی | ' . $page->getName() . ' - ' . $pageGallery->getName();
        $description = $page->getDescription();
        $canonical = route('front.pages.show', $pageGallery->getSlug());
        $image = $pageGallery->getAgentImage('medium');

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);

        SEOTools::setCanonical($canonical);

        SEOTools::opengraph()->setTitle($title);
        SEOTools::opengraph()->setDescription($description);
        SEOTools::opengraph()->addImage($image);
        SEOTools::opengraph()->setUrl($canonical);

        return view('front.galleries.show', compact([
            'pageGallery',
            'images'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PageGallery $pageGallery
     * @return Response
     */
    public function edit(PageGallery $pageGallery)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PageGallery $pageGallery
     * @return Response
     */
    public function destroy(PageGallery $pageGallery)
    {
        //
    }
}
