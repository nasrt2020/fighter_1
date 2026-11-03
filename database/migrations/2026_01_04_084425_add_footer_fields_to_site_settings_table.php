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
    Schema::table('site_settings', function (Blueprint $table) {
        $table->string('footer_about_text')->nullable();
        $table->string('footer_address')->nullable();
        $table->string('footer_email')->nullable();
        $table->string('footer_website')->nullable();
        $table->string('footer_phone')->nullable();

        $table->string('facebook_url')->nullable();
        $table->string('instagram_url')->nullable();
        $table->string('youtube_url')->nullable();
        $table->string('linkedin_url')->nullable();

        $table->string('footer_logo')->nullable(); // optional (path)
        $table->string('footer_copy')->nullable(); // copyright line
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            //
        });
    }
};
