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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('name_book');
            $table->integer('number_book');
            $table->string('image');
            $table->string('description');
            $table->string('pdf');
            $table->string('author');
            $table->string('publisher');
            $table->string('year');
            $table->string('price')->nullable();
            $table->string('language')->nullable();
            $table->integer('code');
            $table->string('classification');
            $table->date('date');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
