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
    Schema::create('timeline_events', function (Blueprint $table) {
        $table->id();
        $table->string('year_label')->nullable(); // e.g. "2017 – EHF Concept Born"
        $table->string('title');                 // short title
        $table->text('description')->nullable();
        $table->string('image_path')->nullable(); // Front/img/video/fighter1.jpg
        $table->enum('side', ['left', 'right'])->default('left'); // which side of timeline
        $table->unsignedInteger('sort_order')->default(0);        // order in timeline
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timeline_events');
    }
};
