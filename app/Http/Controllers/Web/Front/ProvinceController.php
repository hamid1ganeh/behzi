<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function getProvinces()
    {
        $provinces = Province::activeStatus()->get();
        return response()->json($provinces);
    }
}
