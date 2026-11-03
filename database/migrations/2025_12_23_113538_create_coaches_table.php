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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();

            $table->string('name');              // Jamal Hakimi
            $table->string('role')->nullable();  // Head Coach, Striking Coach...
            $table->unsignedTinyInteger('experience_years')->nullable(); // 0-80

            $table->string('primary_specialty')->nullable(); // Striking
            $table->string('other_specialties')->nullable(); // "MMA Strategy, Boxing"
            $table->text('bio')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable(); // optional link or number

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
        Schema::dropIfExists('coaches');
    }
};
