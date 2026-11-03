<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void {
    Schema::create('camp_stats', function (Blueprint $table) {
      $table->id();
      $table->unsignedInteger('fighters_trained')->default(0);
      $table->unsignedInteger('pro_fights_won')->default(0);
      $table->unsignedInteger('years_of_camps')->default(0);
      $table->timestamps();
    });
  }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camp_stats');
    }
};
