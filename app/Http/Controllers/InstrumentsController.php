<?php

namespace App\Http\Controllers;

use App\Http\Resources\InstrumentResource;
use App\Models\Instrument;

class InstrumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InstrumentResource::collection(
            Instrument::all()
        );
    }
}
