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
        Schema::create('reports_moorings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports');
            $table->integer('bio_indicator_id');
            $table->timestamp('date_time');
            $table->integer('person_id');
            $table->integer('organization_id');
            $table->decimal('lattitude', 12, 9); //TODO: misspelled
            $table->decimal('longitude', 12, 9);
            $table->text('description');

            $table->foreign('bio_indicator_id')->references('id')->on('bio_indicators');
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('organization_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports_moorings');
    }
};
