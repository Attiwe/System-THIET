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
        Schema::create('details_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('new_element_id')->constrained('new_elements')->cascadeOnDelete();
            $table->string('title');
            $table->string('publisher');
            $table->string('image');
            $table->string('description'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_news');
    }
};
