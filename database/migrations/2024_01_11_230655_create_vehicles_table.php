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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id');
            $table->integer('ride_id');
            $table->integer('customer_id');
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->string('reg_no');
            $table->string('pass_cap');
            $table->string('category');
            $table->string('insurance');
            $table->string('color');
            $table->string('img');
            $table->string('attachment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
