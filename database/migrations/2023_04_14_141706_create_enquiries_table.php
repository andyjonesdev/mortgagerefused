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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('purpose')->nullable();
            $table->integer('value')->nullable();
            $table->integer('borrow')->nullable();
            $table->boolean('bankruptcy')->nullable();
            $table->boolean('debt')->nullable();
            $table->boolean('ccj')->nullable();
            $table->boolean('missed')->nullable();
            $table->string('status')->nullable();
            $table->boolean('trading')->nullable();
            $table->string('trading_12_months')->nullable();
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->longtext('other_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
