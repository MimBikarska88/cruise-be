<?php

namespace App\Actions;

use App\Data\ReportData;
use App\Models\Report;

class CreateReportAction
{
    /**
     * Constructor.
     *
     * @param  \App\Actions\StoreReportAction  $storeReportAction
     */
    public function __construct(
        protected StoreReportAction $storeReportAction,
    ) {
    }

    /**
     * Handle the action.
     *
     * @param  \App\Data\ReportData  $data
     * @return \App\Models\Report
     */
    public function handle(ReportData $data): Report
    {
        $report = $this->storeReportAction->handle($data);

        $report->parameters()->sync($data->parameters->toCollection()->pluck('id')->toArray());
        $report->instruments()->sync($data->instruments->toCollection()->pluck('id')->toArray());

        return $report;
    }
}
