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
        Schema::create('booked_villas', function (Blueprint $table) {
            $table->id();
            $table->integer('villa_id')->nullable();
            $table->integer('customer_name')->nullable();
            $table->date('checkin_date')->nullable();
            $table->date('Checkout_date')->nullable();
            $table->integer('number_guests')->nullable();
            $table->decimal('Total_price', 10, 2)->nullable();
            $table->text('contact_information')->nullable();
            $table->enum('payment_status', ['pending', 'completed'])->default('pending');
            $table->enum('booking_status', ['confirmed', 'pending', 'canceled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_villas');
    }
};
