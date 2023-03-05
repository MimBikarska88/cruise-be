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
        Schema::create('sea_scape_parameters', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 5)->unique();
            $table->string('name')->nullable();
            $table->string('label');
            $table->string('alternative_label')->default(null)->nullable();
            $table->longText('definition');
            $table->dateTime('modified_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sea_scape_parameters');
    }
};
