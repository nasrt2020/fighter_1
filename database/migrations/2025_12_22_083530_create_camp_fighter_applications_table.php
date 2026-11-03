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
    Schema::create('camp_fighter_applications', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->string('surname');
        $table->string('father_name');

        $table->unsignedTinyInteger('age');
        $table->string('phone');
        $table->string('email')->nullable();
        $table->string('location');

        $table->unsignedSmallInteger('weight_kg');
        $table->string('preferred_session'); // morning|evening|both
        $table->string('discipline');
        $table->string('experience_level'); // beginner|intermediate|pro
        $table->unsignedTinyInteger('experience_years');

        $table->text('message');
        $table->string('social_link')->nullable();

        $table->string('photo_path'); // saved photo path
        $table->enum('status', ['pending','approved','rejected'])->default('pending');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camp_fighter_applications');
    }
};
