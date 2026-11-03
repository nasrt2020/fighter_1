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
        $table->string('top_phone', 50)->nullable();
        $table->string('top_email', 150)->nullable();
        $table->boolean('show_topbar')->default(true);

        // optional if you want separate social urls for topbar (or reuse same)
        $table->string('top_facebook_url')->nullable();
        $table->string('top_youtube_url')->nullable();
        $table->string('top_instagram_url')->nullable();
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
