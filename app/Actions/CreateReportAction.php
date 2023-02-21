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
        return $this->storeReportAction->handle($data);
    }
}
