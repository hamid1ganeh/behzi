<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\WorkCategory;
use App\Models\WorkItem;
use Illuminate\Http\Request;

class WorkItemController extends Controller
{
    public function workCategoryItems($province_id)
    {
        $items = WorkItem::where('work_category_id',$province_id)->activeStatus()->get();
        return response()->json($items);
    }
    public function workItemSearch(Request $request)
    {
        if ($request->search != null)
            return response()->json(WorkItem::where('name', 'like', $request->search . '%')->get());
        else
            return response()->json();
    }
}
