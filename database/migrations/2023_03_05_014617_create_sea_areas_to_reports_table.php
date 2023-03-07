<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sea_areas_to_reports', function (Blueprint $table) {
            $table->foreignId('report_id')->constrained('reports');
            $table->integer('sea_area_id');

            $table->foreign('sea_area_id')->references('id')->on('sea_areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sea_areas_to_reports');
    }
};
