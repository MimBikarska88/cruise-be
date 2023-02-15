<?php

namespace App\Http\Controllers;

use App\Http\Resources\SeaScapeParameterResource;
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
        return SeaScapeParameterResource::collection(
            SeaScapeParameter::all()
        );
    }
}
