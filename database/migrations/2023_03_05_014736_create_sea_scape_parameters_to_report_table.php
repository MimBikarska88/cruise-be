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
        Schema::create('sea_scape_parameters_to_report', function (Blueprint $table) {
            $table->foreignId('report_id')->constrained('reports');
            $table->integer('sea_scape_parameter_id');

            $table->foreign('sea_scape_parameter_id')->references('id')->on('sea_scape_parameters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sea_scape_parameters_to_report');
    }
};
