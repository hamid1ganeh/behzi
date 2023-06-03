<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CityController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Province $province
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Province $province)
    {
        $province->cities()->create($request->only(['name', 'status']));

        return back();
    }

    public function update(Request $request, City $city)
    {
        $city->update($request->only(['name', 'status']));

        return back();
    }


}
