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
        Schema::create('monsters', function (Blueprint $table) {
            $table->id();
            $table->string('monster_name');
            $table->string('health');
            $table->unsignedInteger('skill');
            $table->unsignedInteger('will');
            $table->unsignedInteger('strength');
            $table->unsignedInteger('spell_slot');
            $table->string('monster_image', 1300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monsters');
    }
};
