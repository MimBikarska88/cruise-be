<?php

namespace App\Http\Controllers;

use App\Data\DataAccessRestrictionData;
use App\Models\DataAccessRestriction;
use Illuminate\Http\Request;

class DataAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DataAccessRestrictionData::collection(
            DataAccessRestriction::all()
        );
    }
}
