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
    Schema::create('upcoming_fight_slides', function (Blueprint $table) {
        $table->id();
        $table->foreignId('upcoming_fight_id')->constrained()->cascadeOnDelete();

        // Fighter 1
        $table->string('fighter1_name')->nullable();
        $table->string('fighter1_record')->nullable();
        $table->string('fighter1_flag')->nullable(); // ex: ca, tr
        $table->string('fighter1_image')->nullable(); // storage path
        $table->unsignedTinyInteger('fighter1_age')->nullable();
        $table->string('fighter1_height')->nullable(); // "180 cm"
        $table->string('fighter1_weight')->nullable(); // "77 kg"
        $table->string('fighter1_reach')->nullable();  // "185 cm"

        // Fighter 2
        $table->string('fighter2_name')->nullable();
        $table->string('fighter2_record')->nullable();
        $table->string('fighter2_flag')->nullable();
        $table->string('fighter2_image')->nullable();
        $table->unsignedTinyInteger('fighter2_age')->nullable();
        $table->string('fighter2_height')->nullable();
        $table->string('fighter2_weight')->nullable();
        $table->string('fighter2_reach')->nullable();

        $table->unsignedInteger('sort_order')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upcoming_fight_slides');
    }
};
