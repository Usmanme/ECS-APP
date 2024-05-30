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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->integer('ride_id');
            $table->integer('customer_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone_number');
            $table->string('iqama_number');
            $table->string('email_addr');
            $table->string('img');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
