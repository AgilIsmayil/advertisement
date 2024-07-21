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
        Schema::create('advertisement_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advertisement_id');
            $table->unsignedBigInteger('fuel_type_id');
            $table->unsignedBigInteger('gear_id');
            $table->unsignedBigInteger('ban_id');
            $table->unsignedInteger('year');
            $table->unsignedBigInteger('color_id');
            $table->unsignedInteger('distance')->default(0);
            $table->string('vin_code', 100)->nullable();
            $table->unsignedInteger('city_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisement_infos');
    }
};