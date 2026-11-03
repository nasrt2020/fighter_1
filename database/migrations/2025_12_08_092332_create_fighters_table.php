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
    Schema::create('fighters', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('division')->nullable();
        $table->string('stance')->nullable();
        $table->unsignedInteger('wins')->default(0);
        $table->unsignedInteger('losses')->default(0);
        $table->unsignedInteger('draws')->default(0);
        $table->string('photo_path')->nullable(); // path to image
        $table->text('bio')->nullable();
        $table->boolean('is_featured')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fighters');
    }
};
