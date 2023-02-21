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
        $report = new Report([
            'cruise_name' => $data->cruiseName,
            'creation_date' => $data->creationDate,
            'revision_date' => $data->revisionDate,
            'author' => $data->author,
            'period_start_date' => $data->periodStartDate,
            'period_end_date' => $data->periodEndDate,
            'objectives' => $data->objectives,
            'project_name' => $data->projectName,
            'comment' => $data->comment,
        ]);

        $report->countryOfDeparture()->associate($data->countryOfDeparture);
        $report->portOfDeparture()->associate($data->portOfDeparture);
        $report->countryOfReturn()->associate($data->countryOfReturn);
        $report->portOfReturn()->associate($data->portOfReturn);
        $report->dataAccessRestriction()->associate($data->dataAccessRestriction);
        $report->platform()->associate($data->platform);
        $report->platformCategory()->associate($data->platformCategory);

        return tap($report)->save();
    }
}
