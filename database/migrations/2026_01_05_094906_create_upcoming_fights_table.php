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
    Schema::create('upcoming_fights', function (Blueprint $table) {
        $table->id();
        $table->boolean('is_active')->default(false);

        $table->date('fight_date')->nullable();
        $table->string('venue')->nullable();
        $table->string('weight_class')->nullable();

        // optional auto-hide
        $table->date('active_until')->nullable(); // after this date, hide

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upcoming_fights');
    }
};
