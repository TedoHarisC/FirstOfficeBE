<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //
    public function index()
    {
        $cities = City::withCount('officeSpaces')->get();
        return CityResource::collection($cities);
    }

    /**
     * Show a single city.
     *
     * @authenticated
     * @responseFile responses/city.show.json
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city) // model binding (dan untuk detail salah satu kota nya)
    {
        $city->load('officeSpaces.city', 'officeSpaces.photos');
        $city->loadCount('officeSpaces');
        return new CityResource($city);
    }
}
