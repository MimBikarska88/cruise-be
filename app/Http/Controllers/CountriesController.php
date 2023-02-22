<?php

namespace App\Http\Controllers;

use App\Data\CountryData;
use App\Models\Country;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CountryData::collection(
            Country::all()
        );
    }
}
