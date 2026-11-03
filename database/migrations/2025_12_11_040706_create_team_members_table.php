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
    Schema::create('team_members', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('role')->nullable();        // e.g. "Owner & Founder"
        $table->text('note')->nullable();          // small description
        $table->string('photo_path')->nullable();  // Front/img/video/fighter1.jpg
        $table->boolean('is_owner')->default(false); // true for top card
        $table->unsignedInteger('sort_order')->default(0);
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
