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

            $table->string('description');

            $table->string('type');
            $table->string('mark');
            $table->integer('year');
            $table->string('gearbox');
            $table->string('engine');
            $table->string('color');

            $table->integer('price');
            $table->boolean('isActive')->default(true);
            
            $table->foreignId('tenant_id')->references('id')->on('users')->cascadeOnDelete()->nullable()->default(null);
            $table->timestamps();
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
