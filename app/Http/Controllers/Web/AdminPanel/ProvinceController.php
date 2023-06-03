<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Enums\ProvinceStatus;
use App\Filters\Admin\ProvinceFilter;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Services\V1\ProvinceService;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{

    private $provinceService;

    public function __construct()
    {
        $this->provinceService = new ProvinceService();
    }

    /**
     * Display a listing of the resource.
     *
     * @param ProvinceFilter $provinceFilter
     * @return \Illuminate\Http\Response
     */
    public function index(ProvinceFilter $provinceFilter)
    {
        $provinces = Province::filter($provinceFilter)->paginate(10);


        if (request()->has('bulk_operation_item_select')) {
            $action = request()->get('action');
            $targetProvincesId = request()->get('bulk_operation_item_select');

            if ($action == 0) {
                Province::whereIn('id', $targetProvincesId)->update([
                    'status' => ProvinceStatus::Active
                ]);
            }
        }

        return view('admin-panel.provinces.index', compact([
            'provinces'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.provinces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $province = $this->provinceService->store($request->only(['name', 'status']));
        return redirect()->route('adminPanel.provinces.edit', $province);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        $province = $province->load('cities');
        return view('admin-panel.provinces.edit', compact('province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        $this->provinceService->update($province, $request->only(['name', 'status']));
        alert()->success('بروزرسانی با موفقیت انجام شد');
        return back();
    }


}
