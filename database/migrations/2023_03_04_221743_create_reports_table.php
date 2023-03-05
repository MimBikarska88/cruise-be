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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->uuid('cruise_id');
            $table->string('cruise_name');
            $table->dateTime('creation_date');
            $table->dateTime('revision_date');
            $table->string('author');
            $table->dateTime('period_start_date');
            $table->dateTime('period_end_date');
            $table->integer('country_id_of_departure')->nullable();
            $table->integer('port_id_of_departure')->nullable();
            $table->integer('country_id_of_return')->nullable();
            $table->integer('port_id_of_return')->nullable();
            $table->integer('data_access_restriction_id');
            $table->text('objectives')->nullable();
            $table->char('project_name')->nullable();
            $table->integer('platform_id');
            $table->integer('platform_category_id');
            $table->text('comment')->nullable();

            $table->foreign('country_id_of_departure')->references('id')->on('countries');
            $table->foreign('port_id_of_departure')->references('id')->on('sea_ports');
            $table->foreign('country_id_of_return')->references('id')->on('countries');
            $table->foreign('port_id_of_return')->references('id')->on('sea_ports');
            $table->foreign('data_access_restriction_id')->references('id')->on('data_access_restriction');
            $table->foreign('platform_id')->references('id')->on('platforms');
            $table->foreign('platform_category_id')->references('id')->on('platform_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
