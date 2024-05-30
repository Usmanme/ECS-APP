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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id');
            $table->integer('ride_id');
            $table->integer('vehicle_id');
            $table->string('name');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('nationality');
            $table->string('company');
            $table->string('department');
            $table->string('designation');
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
