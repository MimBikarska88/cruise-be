<?php

namespace App\Actions;

use App\Data\ReportData;
use App\Data\ReportMooringData;
use App\Models\Report;

class UpsertReportAction
{
    /**
     * Constructor.
     *
     * @param  \App\Actions\FillReportAction  $fillReportAction
     * @param  \App\Actions\CreateReportMooringAction  $createReportMooringAction
     */
    public function __construct(
        protected FillReportAction $fillReportAction,
        protected CreateReportMooringAction $createReportMooringAction,
    ) {
    }

    /**
     * Handle the action.
     *
     * @param  \App\Models\Report  $report
     * @param  \App\Data\ReportData  $data
     * @return \App\Models\Report
     */
    public function handle(Report $report, ReportData $data): Report
    {
        $report = $this->fillReportAction->handle($report, $data);

        $report->save();
        $report->moorings()->delete();
        $report->parameters()->sync($data->parameters->toCollection()->pluck('id')->toArray());
        $report->instruments()->sync($data->instruments->toCollection()->pluck('id')->toArray());
        $data->moorings->map(function(ReportMooringData $reportMooringData) use ($report) {
            return $this->createReportMooringAction->handle($report, $reportMooringData);
        });

        return $report;
    }
}
