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
    Schema::create('camp_fighters', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->string('surname')->nullable();
        $table->string('father_name')->nullable();

        $table->unsignedTinyInteger('age')->nullable();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();

        $table->string('location')->nullable(); // city/province

        $table->unsignedSmallInteger('weight_kg')->nullable();
        $table->string('preferred_session')->nullable(); // morning/evening/both

        $table->string('discipline')->nullable();
        $table->string('experience_level')->nullable(); // beginner/intermediate/pro
        $table->unsignedTinyInteger('experience_years')->nullable();

        $table->text('message')->nullable();
        $table->string('social_link')->nullable();

        $table->string('photo_path')->nullable();

        $table->boolean('is_active')->default(true);

        // approval date = created_at here (simple and clean)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camp_fighters');
    }
};
