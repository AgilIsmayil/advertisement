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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('body', 1000);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedInteger('price')->default(0);
            $table->unsignedBigInteger('currency_id')->default(1);
            $table->integer('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};