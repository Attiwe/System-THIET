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
        Schema::create('faculty_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roles_id')->constrained('roles')->onDelete('cascade'); 

            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->string('name');
            $table->enum('type', ['دكتور', 'معيد']);  
            $table->integer('faculty_code');
            $table->string('email')->unique();
            $table->string('facebook')->nullable();
            $table->string('phone')->nullable(); 
            $table->string('username'); 
            $table->string('password');
            $table->enum('appointment_type', ['معين', 'منتدب', 'غير ذلك'])->default('معين');
            $table->date('appointment_date'); 
            $table->string('personal_image'); 
            $table->string('resume'); 
            $table->string('researches')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_members');
    }
};
