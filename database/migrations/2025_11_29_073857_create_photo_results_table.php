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
        Schema::create('photo_results', function (Blueprint $table) {
            $table->id();
            $table->integer('photographer_id');
            $table->integer('booking_id');
            $table->string('photo');
            $table->string('status'); // approved, pending
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_results');
    }
};
