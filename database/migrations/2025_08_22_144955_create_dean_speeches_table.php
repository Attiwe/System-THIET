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
        Schema::create('dean_speeches', function (Blueprint $table) {
            $table->id();
            $table->string('management_name');
            $table->text('title');
            $table->string('resume')->comment('cv of the dean speech')->nullable();
            $table->string('image')->comment('image of the dean speech');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dean_speeches');
    }
};
