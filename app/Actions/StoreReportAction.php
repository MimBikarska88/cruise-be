<?php

namespace App\Actions;

use App\Data\ReportData;
use App\Models\Report;

class StoreReportAction
{
    /**
     * Handle the action.
     *
     * @param  \App\Data\ReportData  $data
     * @return \App\Models\Report
     */
    public function handle(ReportData $data): Report
    {
        return new Report;
    }
}
