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
    Schema::table('site_settings', function (Blueprint $table) {
        $table->string('seo_site_title')->nullable();
        $table->text('seo_site_description')->nullable();
        $table->string('seo_default_og_image')->nullable(); // path stored in DB
    });
}

public function down()
{
    Schema::table('site_settings', function (Blueprint $table) {
        $table->dropColumn([
            'seo_site_title',
            'seo_site_description',
            'seo_default_og_image',
        ]);
    });
}

};
