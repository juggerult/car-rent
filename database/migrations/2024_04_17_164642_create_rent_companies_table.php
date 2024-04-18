<?php

use App\Models\User;
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
        Schema::create('rent_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            
            $table->integer('balance');
            $table->foreignId('owner_id')->references('id')->on('users')->cascadeOnDelete();

            $table->boolean('isActive')->default(true);
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_companies');
    }
};
