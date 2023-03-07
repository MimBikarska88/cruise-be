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
        Schema::create('bio_indicators', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 3)->unique();
            $table->string('name')->nullable();
            $table->string('label')->nullable();
            $table->string('alternative_label')->nullable();
            $table->dateTime('modified_date')->nullable();
            $table->string('definition', 400)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bio_indicators');
    }
};
