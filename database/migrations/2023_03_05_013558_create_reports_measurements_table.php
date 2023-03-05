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
        Schema::create('reports_measurements', function (Blueprint $table) {
            $table->id();
            $table->decimal('quantity', 12, 6);
            $table->integer('unit_id');
            $table->integer('bio_indicator_id');
            $table->timestamp('date_time', 7);
            $table->integer('person_id');
            $table->integer('organization_id');
            $table->text('description');

            $table->foreign('unit_id')->references('id')->on('units');
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
        Schema::dropIfExists('reports_measurements');
    }
};
