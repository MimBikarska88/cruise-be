<?php

namespace App\Http\Controllers;

use App\Http\Resources\BioIndicatorResource;
use App\Models\BioIndicator;

class BioIndicatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BioIndicatorResource::collection(
            BioIndicator::all()
        );
    }
}
