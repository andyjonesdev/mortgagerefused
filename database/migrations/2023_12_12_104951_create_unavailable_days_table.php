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
        Schema::create('unavailable_days', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('calendar_id');
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unavailable_days');
    }
};
