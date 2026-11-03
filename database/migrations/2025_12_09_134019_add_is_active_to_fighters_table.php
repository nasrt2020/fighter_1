<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fighters', function (Blueprint $table) {
            $table->boolean('is_active')
                  ->default(1)
                  ->after('bio'); // or after any existing column (name, record, etc.)
        });
    }

    public function down(): void
    {
        Schema::table('fighters', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
