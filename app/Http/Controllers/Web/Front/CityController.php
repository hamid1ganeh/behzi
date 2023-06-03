<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getProvinceCities($province_id)
    {
        $cities = City::where('province_id',$province_id)->activeStatus()->get();
        return response()->json($cities);
    }
    public function citySearch(Request $request)
    {
        if ($request->search != null)
            return response()->json(City::where('name', 'like', $request->search . '%')->get());
        else
            return response()->json();
    }
}
