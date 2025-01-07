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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->year('year');
            $table->string('vin')->unique();
            $table->string('number')->unique();
            $table->string('class');
            $table->integer('power');
            $table->integer('mileage');
            $table->boolean('insurance_status');
            $table->integer('service_interval');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
