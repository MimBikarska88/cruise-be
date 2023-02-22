<?php

namespace App\Http\Controllers;

use App\Data\BioIndicatorData;
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
        return BioIndicatorData::collection(
            BioIndicator::all()
        );
    }
}
