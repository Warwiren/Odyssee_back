<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('map_scenarios', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->unsignedBigInteger('scenario_id');
            $table->unsignedBigInteger('map_id');
            $table->timestamps();

            // Définir les clés étrangères
            $table->foreign('scenario_id')->references('id')->on('scenarios');
            $table->foreign('map_id')->references('id')->on('maps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('map_scenarios');
    }
};
