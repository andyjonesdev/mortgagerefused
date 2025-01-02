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
        Schema::table('homes', function (Blueprint $table) {
            $table->longText('content_17')->nullable();
            $table->longText('content_18')->nullable();
            $table->longText('content_19')->nullable();
            $table->longText('content_20')->nullable();
            $table->longText('content_21')->nullable();
            $table->longText('content_22')->nullable();
            $table->longText('content_23')->nullable();
            $table->longText('content_24')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            //
        });
    }
};
