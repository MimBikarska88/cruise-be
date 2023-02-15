<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlatformCategoryResource;
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
        return PlatformCategoryResource::collection(
            PlatformCategory::all()
        );
    }
}
