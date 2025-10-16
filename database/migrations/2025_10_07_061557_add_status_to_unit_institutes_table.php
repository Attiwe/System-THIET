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
        if (!Schema::hasColumn('unit_institutes', 'status')) {
        Schema::table('unit_institutes', function (Blueprint $table) {
            $table->boolean('status')->default(true)->after('image');
        });

    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unit_institutes', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};