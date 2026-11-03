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
        $table->text('seo_keywords')->nullable()->after('seo_site_description');
    });
}

public function down()
{
    Schema::table('site_settings', function (Blueprint $table) {
        $table->dropColumn('seo_keywords');
    });
}

};
