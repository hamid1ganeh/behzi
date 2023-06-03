<?php


namespace App\Services\V1;


use App\Models\Page;
use App\Models\PageAddress;
use Illuminate\Http\Request;

class PageAddressService
{

    public function store(int $pageId,Request $request)
    {
//        $page = Page::find($pageId);
        $pageAddress = new PageAddress();
        $pageAddress->page_id = $pageId;
        $pageAddress->city_id = $request->city_id;
        $pageAddress->address = $request->address;
        $pageAddress->lat     = $request->lat;
        $pageAddress->lng     = $request->lng;
        $pageAddress->status  = 1;
//        $page->address()->save($pageAddress);
        return $pageAddress;
    }
}