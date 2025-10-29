<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('imported_books', function (Blueprint $table) {
            $table->id();
            $table->date('issue_date')->nullable();
            $table->string('row_number')->nullable();
            $table->string('book_name')->nullable();
            $table->string('author')->nullable();
            $table->string('general_number')->nullable();
            $table->text('topics')->nullable();
            $table->timestamps();
            $table->index(['general_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imported_books');
    }
};


