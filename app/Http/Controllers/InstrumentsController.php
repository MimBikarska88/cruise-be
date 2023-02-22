<?php

namespace App\Http\Controllers;

use App\Data\InstrumentData;
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
        return InstrumentData::collection(
            Instrument::all()
        );
    }
}
