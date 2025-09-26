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
        Schema::create('borrow_books', function (Blueprint $table) {
            $table->id();
             $table->foreignId('library_id')->constrained('libraries')->cascadeOnDelete();
             $table->string('borrow_date');
             $table->string('return_date');
             $table->string('borrower_name');
             $table->string('borrower_phone')->nullable();
             $table->string('borrower_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_books');
    }
};
