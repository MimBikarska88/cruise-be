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
        Schema::create('reports_gml_curves_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gml_curve_id')->constrained('reports_gml_curves');
            $table->decimal('latitude', 12, 9);
            $table->decimal('longitude', 12, 9);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports_gml_curves_points');
    }
};
