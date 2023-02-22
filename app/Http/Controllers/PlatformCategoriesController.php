<?php

namespace App\Http\Controllers;

use App\Data\PlatformCategoryData;
use App\Models\PlatformCategory;

class PlatformCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PlatformCategoryData::collection(
            PlatformCategory::all()
        );
    }
}
