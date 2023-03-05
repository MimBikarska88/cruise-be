<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('organizations', function (Blueprint $table) {
            $uuid = DB::connection()->getDriverName() === 'mysql'
                ? DB::raw('(UUID())')
                : DB::raw('NEWID()');

            $table->integer('id', true);
            $table->uuid('code')->unique()->default($uuid);
            $table->string('phone', 50)->default(null)->nullable();
            $table->string('fax', 50)->default(null)->nullable();
            $table->string('delivery_point')->default(null)->nullable();
            $table->string('city', 100)->default(null)->nullable();
            $table->string('postal_code', 15)->default(null)->nullable();
            $table->string('email')->default(null)->nullable();
            $table->string('web_site')->default(null)->nullable();
            $table->integer('country_id')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};
