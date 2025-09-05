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
        Schema::create('library_opinions', function (Blueprint $table) {
            $table->id();
            $table->string('number_library');
            $table->string('number_prizes');
            $table->string('image_student');
            $table->string('image_library');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_opinions');
    }
};
