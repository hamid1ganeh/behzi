<?php


namespace App\Services\V1;


use App\Enums\PageGalleryStatus;
use App\Models\PageGallery;

class PageGalleryService
{

    public function read($paginate=false)
    {

    }

    public function create($request)
    {
        $pageGallery = new PageGallery();
        $pageGallery->name = $request->name;
        $pageGallery->status = PageGalleryStatus::Approved;

        return $pageGallery;
    }

    public function update($request, $page)
    {
//        $page->name = $request->name;
//        $page->work_item_id = $request->work_item_id;
//        $page->save();
//
//        $pageAddress = $page->address;
//        $pageAddress->city_id = $request->city_id;
//        $pageAddress->address = $request->address;
//        if ($request->has('location')) {
//            $pageAddress->lat = $request->lat;
//            $pageAddress->lng = $request->lng;
//        }
//        $pageAddress->save();
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}