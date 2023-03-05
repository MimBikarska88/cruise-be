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
        Schema::create('data_access_restriction', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 2)->unique();
            $table->string('label');
            $table->longText('definition');
            $table->string('alternative_label')->nullable();
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
        Schema::dropIfExists('data_access_restriction');
    }
};
