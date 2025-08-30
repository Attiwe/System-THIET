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
        Schema::create('category_managements', function (Blueprint $table) {
            $table->id();
            $table->string('dean') ;
            $table->string('vice_dean_students') ;
            $table->string('secretary'); 
            $table->string('account_manager') ;
            $table->string('hr_manager') ;
            $table->string('student_affairs_manager');
            $table->string('it_manager') ;
            $table->string('civil_head') ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_managements');
    }
};
