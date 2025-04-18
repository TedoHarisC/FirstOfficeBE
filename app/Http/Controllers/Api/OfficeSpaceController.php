<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\OfficeSpaceResource;
use App\Models\OfficeSpace;
use Illuminate\Http\Request;

class OfficeSpaceController extends Controller
{
    public function index()
    {
        $officeSpaces = OfficeSpace::withCount('officeSpaces')->get();
        return OfficeSpaceResource::collection($officeSpaces);
    }

    /**
     * Show a single city.
     *
     * @authenticated
     * @responseFile responses/city.show.json
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeSpace $officeSpace) // model binding (dan untuk detail salah satu kota nya)
    {
        $officeSpace->load(['city', 'photos', 'benefits']);
        return new officeSpaceResource($officeSpace);
    }
}
