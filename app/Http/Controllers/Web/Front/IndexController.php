<?php

namespace App\Http\Controllers\Web\Front;

use App\Filters\PageFilter;
use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Page;
use App\Models\Province;
use App\Models\User;
use App\Models\WorkCategory;
use App\Models\WorkItem;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $provinces = Province::activeStatus()->get();
        $provincesAll = Province::with('province_meta')->get();
        $workCategories = WorkCategory::activeStatus()->get();

        // SEO
        $title = 'بهزی | ویترین کسب و کار شما در فضای مجازی';
        $description = 'هدف بهزی تسهیل تبلیغات کسب و کار شما در فضای مجازی و جمع آوری اطلاعات مشاغل مختلف به صورت متمرکز همچون یک بانک مشاغل است';
        $canonical = route('front.index');
        $image = asset('images/static/logo.png');

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);

        SEOTools::setCanonical($canonical);

        SEOTools::opengraph()->setTitle($title);
        SEOTools::opengraph()->setDescription($description);
        SEOTools::opengraph()->addImage($image);
        SEOTools::opengraph()->setUrl($canonical);


        $latestPages = Page::with(['address.city.province','work_item.work_category','image'])->orderBy('created_at','DESC')->take(5)->get();
        $bestPages = Page::with(['address.city.province','work_item.work_category','image'])->orderBy('rate','DESC')->take(5)->get();
        return view('front.index', compact([
            'provinces',
            'provincesAll',
            'workCategories',
            'latestPages',
            'bestPages'
        ]));
    }

//    public function index($tag=null)
//    {
//        if ($tag == null)
//            return view('welcome');
//
//        switch ($tag)
//        {
//            case $tag == 'users':
//                    dd(User::with('pages.work_item.work_category','domains')->get()->toArray());
//            break;
//            case $tag == 'pages':
//                    dd(Page::with('users','work_item.work_category')->get()->toArray());
//            break;
//            case $tag == 'domains':
//                    dd(Domain::with('user.pages')->get()->toArray());
//            break;
//            case $tag == 'work-categories':
//                dd(WorkCategory::with('work_items','users')->get()->toArray());
//            break;
//            case $tag == 'work-items':
//                dd(WorkItem::with('work_category','pages.users')->get()->toArray());
//            break;
//        }


//        true :        return model UserType             {{ dd(\App\Models\User::find(1)->pages->first()->pivot->user_type_model) }}
//        $user = User::find(1);
//        $userDomains = $user->domains()->get();
////        $userPages = $user->pages()->with('pivot.user_type')->get();
//        $userPages = $user->pages()->first()->pivot->user_type()->name;
//        dd($userPages->toArray());


//        dd(Page::with('work_item.work_category')->get()->toArray());
//        dd(WorkCategory::with('users')->get()->toArray());




//    }
}
