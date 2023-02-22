<?php

namespace App\Http\Controllers;

use App\Data\SeaScapeParameterData;
use App\Models\SeaScapeParameter;

class SeaScapeParametersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SeaScapeParameterData::collection(
            SeaScapeParameter::all()
        );
    }
}
