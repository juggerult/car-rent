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
        Schema::create('rent_session', function (Blueprint $table) {
            $table->id();

            $table->dateTime('date_start');
            $table->dateTime('date_end'); 
            $table->integer('price');
            $table->foreignId('car_id')->references('id')->on('cars')->cascadeOnDelete();
            $table->foreignId('tenant_id')->references('id')->on('users')->cascadeOnDelete()->nullable();
            
            $table->string('payment_type');
            $table->boolean('isPledgeReturned')->default(false);
            
            $table->boolean('isActive')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_session');
    }
};
