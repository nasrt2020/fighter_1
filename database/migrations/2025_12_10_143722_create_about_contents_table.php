<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('about_contents', function (Blueprint $table) {
        $table->id();

        // Hero / About section content
        $table->string('hero_title')->nullable();        // "About Us"
        $table->text('hero_text')->nullable();           // main paragraph on home

        // Stats (used on About page too)
        $table->integer('stat_fighters_trained')->default(0);
        $table->integer('stat_pro_fights_won')->default(0);
        $table->integer('stat_years_of_camps')->default(0);

        // Vision section
        $table->string('vision_title')->nullable();      // "Our Vision"
        $table->text('vision_text')->nullable();         // vision paragraph
        $table->string('vision_video_url')->nullable();  // video link

        // Images (optional, can be null)
        $table->string('hero_image')->nullable();        // e.g. Front/img/about/about2.jpg
        $table->string('vision_image')->nullable();      // e.g. Front/img/video/isr.jpg

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_contents');
    }
};
