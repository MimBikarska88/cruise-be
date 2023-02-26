<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/bio-indicators', 'BioIndicatorsController@index');
Route::get('/countries', 'CountriesController@index');
Route::get('/organizations', 'OrganizationsController@index');
Route::get('/sea-scape-parameters', 'SeaScapeParametersController@index');
Route::get('/units', 'UnitsController@index');
Route::get('/platform-categories', 'PlatformCategoriesController@index');
Route::get('/instruments', 'InstrumentsController@index');
Route::get('/data-access-restriction', 'DataAccessController@index');

Route::post('/reports', 'ReportsController@store');
