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
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('building_name',255)->nullable();
            $table->string('floor_number',255)->nullable();
            $table->string('unit_code',255)->nullable();
            $table->string('owner_name',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('booking_number',255)->nullable();
            $table->string('sales_name',255)->nullable();
            $table->string('national_id',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
