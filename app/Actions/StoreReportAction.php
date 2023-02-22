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

        $report->countryOfDeparture()->associate($data->countryOfDeparture->id);
        $report->portOfDeparture()->associate($data->portOfDeparture->id);
        $report->countryOfReturn()->associate($data->countryOfReturn->id);
        $report->portOfReturn()->associate($data->portOfReturn->id);
        $report->dataAccessRestriction()->associate($data->dataAccessRestriction->id);
        $report->platform()->associate($data->platform->id);
        $report->platformCategory()->associate($data->platformCategory->id);

        return tap($report)->save();
    }
}
