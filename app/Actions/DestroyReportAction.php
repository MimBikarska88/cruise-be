<?php

namespace App\Actions;

use App\Models\Report;

class DestroyReportAction
{
    /**
     * Handle the action.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function handle(Report $report): void
    {
        $report->parameters()->detach();
        $report->instruments()->detach();
        $report->delete();
    }
}
