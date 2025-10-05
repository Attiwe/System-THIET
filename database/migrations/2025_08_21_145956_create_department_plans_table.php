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
        Schema::create('department_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->string('research_plan')->nullable(); // ملف خطة البحث
            $table->string('law')->nullable(); // ملف اللائحة الداخلية
            $table->string('department_book')->nullable(); // ملف كتاب القسم
            $table->string('council')->nullable(); // ملف المجلس
            $table->string('courses')->nullable(); // ملف المقررات الدراسية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_plans');
    }
};
