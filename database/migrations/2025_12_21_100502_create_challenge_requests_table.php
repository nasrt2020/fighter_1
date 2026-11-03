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
        Schema::create('challenge_requests', function (Blueprint $table) {
            $table->id();

            // Link to EHF Fighter
            $table->foreignId('ehf_fighter_id')
                ->constrained('ehf_fighters')
                ->cascadeOnDelete();

            // Request type + status
            $table->string('type')->default('challenge'); // challenge | sparring | booking
            $table->string('status')->default('new');     // new | in_review | accepted | rejected | completed

            // Organization / Contact
            $table->string('org_name')->nullable();
            $table->string('contact_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();

            // Challenger fighter info
            $table->string('challenger_name');
            $table->unsignedTinyInteger('challenger_age')->nullable();
            $table->unsignedSmallInteger('challenger_weight_kg');
            $table->string('challenger_weight_class')->nullable();

            $table->unsignedSmallInteger('record_wins')->default(0);
            $table->unsignedSmallInteger('record_losses')->default(0);
            $table->unsignedSmallInteger('record_draws')->default(0);

            $table->string('profile_link')->nullable();
            $table->string('photo_path')->nullable();

            // Match request details
            $table->date('preferred_date_from')->nullable();
            $table->date('preferred_date_to')->nullable();
            $table->string('location_preference')->nullable();
            $table->text('message');

            // Admin internal notes
            $table->text('admin_notes')->nullable();

            $table->timestamps();

            // Helpful indexes
            $table->index(['status', 'type']);
            $table->index('ehf_fighter_id');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_requests');
    }
};
