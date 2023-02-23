<?php

namespace App\Http\Controllers;

use App\Data\OrganizationData;
use App\Models\Organization;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrganizationData::collection(
            Organization::with('country')->get()
        );
    }
}
