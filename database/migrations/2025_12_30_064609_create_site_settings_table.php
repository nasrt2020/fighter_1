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
       Schema::create('site_settings', function (Blueprint $table) {
    $table->id();

    $table->string('phone_1')->nullable();
    $table->string('phone_2')->nullable();

    $table->string('email_1')->nullable();
    $table->string('email_2')->nullable();

    $table->string('address_line_1')->nullable();
    $table->string('address_line_2')->nullable();

    $table->text('map_iframe_src')->nullable(); // google embed src

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
