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
    Schema::table('camp_fighters', function (Blueprint $table) {
        $table->unsignedBigInteger('application_id')->nullable()->after('id');

        $table->foreign('application_id')
              ->references('id')
              ->on('camp_fighter_applications')
              ->nullOnDelete();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('camp_fighters', function (Blueprint $table) {
            //
        });
    }
};
