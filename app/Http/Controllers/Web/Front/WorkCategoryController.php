<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\WorkCategory;
use Illuminate\Http\Request;

class WorkCategoryController extends Controller
{
    public function workCategories()
    {
        $categories = WorkCategory::activeStatus()->get();
        return response()->json($categories);
    }
    public function workCategorySearch(Request $request)
    {
        if ($request->search != null)
            return response()->json(WorkCategory::where('name', 'like', $request->search . '%')->get());
        else
            return response()->json();
    }
}
