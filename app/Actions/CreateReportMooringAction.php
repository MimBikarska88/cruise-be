<?php

namespace App\Actions;

use App\Data\ReportMooringData;
use App\Models\Report;
use App\Models\ReportMooring;

class CreateReportMooringAction
{
    public function handle(Report $report, ReportMooringData $reportMooringData): ReportMooring
    {
        return ReportMooring::query()->create([
            'report_id' => $report->id,
            'bio_indicator_id' => $reportMooringData->bioIndicator->id,
            'date_time' => $reportMooringData->dateTime,
            'person_id' => $reportMooringData->person->id,
            'organization_id' => $reportMooringData->organization->id,
            'latitude' => $reportMooringData->latitude,
            'longitude' => $reportMooringData->longitude,
            'description' => $reportMooringData->description,
        ]);
    }
}
