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
    Schema::create('ehf_fighters', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->string('nickname')->nullable();

        $table->unsignedTinyInteger('age')->nullable();
        $table->unsignedSmallInteger('weight_kg')->nullable();
        $table->string('weight_class')->nullable();

        $table->unsignedSmallInteger('wins')->default(0);
        $table->unsignedSmallInteger('losses')->default(0);
        $table->unsignedSmallInteger('draws')->default(0);

        $table->string('country_code', 2)->nullable();

        $table->text('short_bio')->nullable();
        $table->longText('full_bio')->nullable();

        $table->string('photo_path')->nullable();

        $table->boolean('is_active')->default(true);

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ehf_fighters');
    }
};
