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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id');
            $table->integer('customer_id');
            $table->integer('vehicle_id');
            $table->string('ride_city');
            $table->string('b2b_day_hour');
            $table->longText('booking_pickup');
            $table->longText('booking_drop');
            $table->string('distance');
            $table->string('category');
            $table->string('cutomer_number');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('guest_number');
            $table->string('flight_number');
            $table->string('terminal_number');
            $table->longText('flight_detail');
            $table->string('hotel_name');
            $table->longText('hotel_pickup');
            $table->longText('hotel_drop');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
