<?php

namespace App\Actions;

use App\Data\ReportData;
use App\Models\Report;

class UpsertReportAction
{
    /**
     * Constructor.
     *
     * @param  \App\Actions\FillReportAction  $fillReportAction
     */
    public function __construct(
        protected FillReportAction $fillReportAction,
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
        $report->parameters()->sync($data->parameters->toCollection()->pluck('id')->toArray());
        $report->instruments()->sync($data->instruments->toCollection()->pluck('id')->toArray());

        return $report;
    }
}
