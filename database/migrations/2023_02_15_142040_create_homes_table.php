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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->longText('content_1')->nullable();
            $table->longText('content_2')->nullable();
            $table->longText('content_3')->nullable();
            $table->longText('content_4')->nullable();
            $table->longText('content_5')->nullable();
            $table->longText('content_6')->nullable();
            $table->longText('content_7')->nullable();
            $table->longText('content_8')->nullable();
            $table->longText('content_9')->nullable();
            $table->longText('content_10')->nullable();
            $table->longText('content_11')->nullable();
            $table->longText('content_12')->nullable();
            $table->longText('content_13')->nullable();
            $table->longText('content_14')->nullable();
            $table->longText('content_15')->nullable();
            $table->longText('content_16')->nullable();
            $table->string('slug')->nullable();
            $table->string('rand_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
