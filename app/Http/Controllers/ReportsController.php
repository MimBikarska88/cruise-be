<?php

namespace App\Http\Controllers;

use App\Actions\UpsertReportAction;
use App\Actions\DestroyReportAction;
use App\Data\ReportData;
use App\Models\Report;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ReportData::collection(Report::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Data\ReportData  $data
     * @param  \App\Actions\UpsertReportAction  $upsertReportAction
     * @return \Illuminate\Http\Response
     */
    public function store(
        ReportData $data,
        UpsertReportAction $upsertReportAction,
    ) {
        $report = $upsertReportAction->handle(new Report(), $data);

        return ReportData::from($report->load([
            'countryOfDeparture',
            'portOfDeparture',
            'countryOfReturn',
            'portOfReturn',
            'dataAccessRestriction',
            'platform',
            'platformCategory',
            'parameters',
            'instruments',
            'moorings',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return ReportData::from($report->load([
            'countryOfDeparture',
            'portOfDeparture',
            'countryOfReturn',
            'portOfReturn',
            'dataAccessRestriction',
            'platform',
            'platformCategory',
            'parameters',
            'instruments',
            'moorings',
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Data\ReportData  $data
     * @param  \App\Models\Report  $report
     * @param  \App\Actions\UpsertReportAction  $upsertReportAction
     * @return \Illuminate\Http\Response
     */
    public function update(
        ReportData $data,
        Report $report,
        UpsertReportAction $upsertReportAction,
    ) {
        $report = $upsertReportAction->handle($report, $data);

        return ReportData::from($report->load([
            'countryOfDeparture',
            'portOfDeparture',
            'countryOfReturn',
            'portOfReturn',
            'dataAccessRestriction',
            'platform',
            'platformCategory',
            'parameters',
            'instruments',
            'moorings',
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @param  \App\Actions\DestroyReportAction  $destroyReportAction
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Report $report,
        DestroyReportAction $destroyReportAction
    ) {
        $destroyReportAction->handle($report);

        return response()->noContent();
    }
}
