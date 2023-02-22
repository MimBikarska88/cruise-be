<?php

namespace App\Http\Controllers;

use App\Data\UnitData;
use App\Models\Unit;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UnitData::collection(
            Unit::all()
        );
    }
}
