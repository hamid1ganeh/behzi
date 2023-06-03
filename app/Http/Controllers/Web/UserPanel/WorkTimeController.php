<?php

namespace App\Http\Controllers\Web\UserPanel;

use App\Enums\PageWorkTimeStatus;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageWorkTime;
use Illuminate\Http\Request;

class WorkTimeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function index(Page $page)
    {
        return response()->json([
            'workTimes' => $page->work_times
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page)
    {
        return view('user-panel.pages.work-times.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Page $page)
    {
        if (!$request->has('isUpdate')) {

            $weekDays = $request->weekDays;
            $workTimes = [];

            foreach ($weekDays as $day) {
                foreach ($day as $time) {
                    array_push($workTimes, new PageWorkTime(
                        [
                            'page_id' => $page->id,
                            'week_day_id' => $time['id'],
                            'startTime' => $time['start'],
                            'endTime' => $time['finish'],
                            'status' => $time['enable'] ? PageWorkTimeStatus::Open : PageWorkTimeStatus::Close
                        ]
                    ));
                }
            }
            $lastWorkTimes = $page->work_times()->count();
            if ($lastWorkTimes > 0) {
                $page->work_times()->delete();
                $page->work_times()->saveMany($workTimes);
            } else {
                $page->work_times()->saveMany($workTimes);
            }
        } else {
            $weekDays = $request->weekDays;
            PageWorkTime::whereIn('id', $request->deleteList)->delete();
            foreach ($weekDays as $day) {
                foreach ($day as $time) {
                    if ($time['rowId'] == 0) {
                        $newWorkTime = new PageWorkTime();
                        $newWorkTime->page_id = $page->id;
                        $newWorkTime->week_day_id = $time['id'];
                        $newWorkTime->startTime = $time['start'];
                        $newWorkTime->endTime = $time['finish'];
                        $newWorkTime->status = $time['enable'] ? PageWorkTimeStatus::Open : PageWorkTimeStatus::Close;
                        $newWorkTime->save();
                    } else {
                        $pageWorkTime = PageWorkTime::find($time['rowId']);
                        $pageWorkTime->startTime = $time['start'];
                        $pageWorkTime->endTime = $time['finish'];
                        $pageWorkTime->status = $time['enable'] ? PageWorkTimeStatus::Open : PageWorkTimeStatus::Close;
                        $pageWorkTime->save();
                    }

                }
            }
        }
        return response()->json();
    }
}
