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
    Schema::create('hero_slides', function (Blueprint $table) {
        $table->id();
        $table->string('title');                   // main heading
        $table->string('subtitle')->nullable();    // small text above
        $table->string('button_text')->nullable(); // e.g. "Train With Us"
        $table->string('button_link')->nullable(); // e.g. "#joinTeamForm" or /about
        $table->string('image_path')->nullable();  // stored image path
        $table->unsignedTinyInteger('overlay')->default(6); // data-overlay-dark
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
        Schema::dropIfExists('hero_slides');
    }
};
