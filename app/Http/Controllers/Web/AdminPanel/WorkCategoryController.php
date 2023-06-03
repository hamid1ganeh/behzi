<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Enums\WorkCategoryStatus;
use App\Filters\Admin\WorkCategoryFilter;
use App\Http\Controllers\Controller;
use App\Models\WorkCategory;
use App\Services\V1\WorkCategoryService;
use Illuminate\Http\Request;

class WorkCategoryController extends Controller
{

    private $workCategoryService;

    public function __construct()
    {
        $this->workCategoryService = new WorkCategoryService();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $workCategoryFilter = new WorkCategoryFilter($request);

        $this->bulkOperation($request);

        $workCategories = WorkCategory::filter($workCategoryFilter)->paginate(10);

        return view('admin-panel.work_categories.index', compact([
            'workCategories'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.work_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'status' => $request->get('status')
        ];

        $workCategory = $this->workCategoryService->store($data);

        return redirect()->route('adminPanel.work_categories.edit', $workCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkCategory $workCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkCategory $workCategory)
    {
        return view('admin-panel.work_categories.edit', compact('workCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\WorkCategory $workCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkCategory $workCategory)
    {
        $data = [
            'name' => $request->get('name'),
            'status' => $request->get('status')
        ];

        $this->workCategoryService->update($workCategory, $data);


        return back();
    }


    private function bulkOperation(Request $request)
    {
        if ($request->has('bulk_operation_item_select')) {
            $action = $request->get('action');
            $targetCategoriesId = $request->get('bulk_operation_item_select');

            if ($action == 0) {
                WorkCategory::whereIn('id', $targetCategoriesId)->update([
                    'status' => WorkCategoryStatus::Active
                ]);
            } else if ($action == 1) {
                WorkCategory::whereIn('id', $targetCategoriesId)->update([
                    'status' => WorkCategoryStatus::Inactive
                ]);

            }
        }
    }
}
