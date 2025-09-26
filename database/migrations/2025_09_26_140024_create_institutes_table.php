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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setting_id')->constrained('settings')->cascadeOnDelete();
            $table->foreignId('unit_id')->constrained('units')->cascadeOnDelete();
           
            $table->string('vidio')->nullable();
            $table->string('word')->nullable(); // كلمة
            $table->string('muhadara')->nullable(); // المحارو 
            $table->string('values')->nullable(); //  القيم 
            $table->string('plan')->nullable(); //   الخطه 
            $table->string('goals')->nullable(); //   الاهداف 
 
            // intager
            $table->integer('number')->nullable(); //    عدد الطلاب
            $table->integer('employees')->nullable(); //       العاملين المعهد
            $table->integer('classrooms')->nullable(); //         المدرجات و القاعات الدراسية
            $table->integer('graduates')->nullable(); //        الخرجين
            
            /// files
            $table->string('academic_council')->nullable(); // المجلس الأكاديمي
            $table->string('structure')->nullable(); //    الهيكل التنظيمي
            $table->string('strategy')->nullable(); //       استراتيجية التعليم
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutes');
    }
};
