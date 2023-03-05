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
        Schema::create('sea_areas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('label')->nullable();
            $table->string('alternative_label')->nullable();
            $table->dateTime('date_modified')->nullable();
            $table->string('name')->nullable();
            $table->string('definition')->nullable();
            $table->string('code', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sea_areas');
    }
};
