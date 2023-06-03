<?php

namespace App\Http\Controllers\Web\Front;

use App\Filters\PageFilter;
use App\Http\Controllers\Controller;
use App\Http\Middleware\IncrementPageViewCount;
use App\Models\City;
use App\Models\Page;
use App\Models\Province;
use App\Models\WeekDay;
use App\Models\WorkCategory;
use App\Models\WorkItem;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PageFilter $pageFilter
     * @return Factory|View
     */
    public function index(PageFilter $pageFilter)
    {
        $cities = City::activeStatus()->get();
        $provinces = Province::activeStatus()->get();
        $workItems = WorkItem::activeStatus()->get();
        $workCategories = WorkCategory::activeStatus()->get();
        $pages = Page::activeStatus()->filter($pageFilter)->with(['address.city.province','work_item', 'image'])->paginate(18);

        // SEO
        $title = 'بهزی | ویترین کسب و کار شما در فضای مجازی';
        $description = 'هدف بهزی تسهیل تبلیغات کسب و کار شما در فضای مجازی و جمع آوری اطلاعات مشاغل مختلف به صورت متمرکز همچون یک بانک مشاغل است';
        $canonical = route('front.pages.index');
        $image = asset('images/static/logo.png');

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);

        SEOTools::setCanonical($canonical);

        SEOTools::opengraph()->setTitle($title);
        SEOTools::opengraph()->setDescription($description);
        SEOTools::opengraph()->addImage($image);
        SEOTools::opengraph()->setUrl($canonical);

        if (auth()->check()) {
            activity('visit occurred')
                ->causedBy(auth()->user())
                ->withProperties(['url' => request()->fullUrl()])
                ->log('The user visited the page list');
        }

        return view('front.pages.index', compact([
            'pages',
            'cities',
            'provinces',
            'workItems',
            'workCategories'
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @return Factory|View
     */
    public function show(Page $page)
    {
        $this->middleware(IncrementPageViewCount::class);

        $page = $page->load([
            'page_galleries',
            'page_galleries.page_gallery_images',
            'page_connections',
            'phones'
        ]);

        $galleries = $page->page_galleries()->approvedStatus()->paginate(3);

        $week_days = WeekDay::all();


        // SEO
        $title = 'بهزی | ' . $page->getName();
        $description = $page->getDescription();
        $canonical = route('front.pages.show', $page->getSlug());
        $image = $page->getPageImage('medium');

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);

        SEOTools::setCanonical($canonical);

        SEOTools::opengraph()->setTitle($title);
        SEOTools::opengraph()->setDescription($description);
        SEOTools::opengraph()->addImage($image);
        SEOTools::opengraph()->setUrl($canonical);

        if (auth()->check()) {
            activity('visit occurred')
                ->on($page)
                ->causedBy(auth()->user())
                ->withProperties(['url' => request()->fullUrl()])
                ->log('The user visited the page');
        }


        return view('front.pages.show', compact([
            'page',
            'week_days',
            'galleries'
        ]));

    }


    public function pageRateStore(Request $request, Page $page)
    {

        if (!auth()->check()) {
            return \response()->json([
                'message' => 'برای رای دهی ورود کنید'
            ]);
        }

        $user_id = auth()->user()->id;
        $rate = $request->get('rate');

        $this->validate($request, [
            'rate' => 'required|integer|between:1,5'
        ]);

        $user_id = auth()->user()->id;
        $rate = $request->rate;
        $oldRate = $page->rates()->where('user_id', $user_id);

        if ($oldRate->count()) {
            $oldRate = $oldRate->first();
            $oldRate->rate = $rate;
            $oldRate->save();

            activity('rate occurred')
                ->causedBy(auth()->user())
                ->on($page)
                ->withProperties(['rate' => $rate])
                ->log('Rate has been updated');


        } else {
            $page->rates()->create([
                'user_id' => $user_id,
                'rate' => $rate
            ]);

            activity('rate occurred')
                ->causedBy(auth()->user())
                ->on($page)
                ->withProperties(['rate' => $rate])
                ->log('Rate has been submitted');
        }

        $sumOfRates = $page->rates->sum('rate') + $rate;
        $numberOfRateRecord = $page->rates->count() + 1;

        return \response()->json([
            'message' => 'رای شما ثبت شد',
            'avgRate' => round($sumOfRates / $numberOfRateRecord, 2)
        ]);

    }
}
