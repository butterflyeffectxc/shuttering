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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('photographer_id');
            $table->date('session_date');
            $table->time('session_duration');
            $table->string('session_location');
            $table->float('total_price');
            $table->string('photo_type');
            $table->text('notes')->nullable();
            $table->string('status')->default("1");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
