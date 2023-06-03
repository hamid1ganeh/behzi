<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\WorkCategory;
use App\Models\WorkItem;
use Illuminate\Http\Request;

class WorkItemController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param WorkCategory $workCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, WorkCategory $workCategory)
    {

        $workCategory->work_items()->create([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\WorkItem $workItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkItem $workItem)
    {
        $workItem->name = $request->get('name');
        $workItem->status = $request->get('status');

        $workItem->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkItem $workItem
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(WorkItem $workItem)
    {
        if ($workItem->pages->count() == 0) {
            $workItem->delete();
        } else {
            alert()->error('ابتدا صفحات متصل به این زیر دسته را خارج کنید');
        }


        return back();
    }

    public function recycle(WorkItem $workItem)
    {
        $workItem->restore();

        return back();
    }

    public function exchangeWorkCategory (Request $request, WorkItem $workItem)
    {
        $workCategory = WorkCategory::findOrFail($request->get('work_category'));
        $workCategory->work_items()->save($workItem);

        return back();
    }
}
