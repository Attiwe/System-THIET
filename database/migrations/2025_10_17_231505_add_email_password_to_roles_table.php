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
        Schema::table('roles', function (Blueprint $table) {
            if (!Schema::hasColumn('roles', 'email')) {
                $table->string('email')->nullable()->unique()->after('role');
            }
            if (!Schema::hasColumn('roles', 'password')) {
                $table->string('password')->nullable()->after('email');
            }
            if (!Schema::hasColumn('roles', 'is_protected')) {
                $table->boolean('is_protected')->default(false)->after('password');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn(['email', 'password', 'is_protected']);
        });
    }
};