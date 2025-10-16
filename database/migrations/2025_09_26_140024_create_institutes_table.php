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
            $table->foreignId('unit_institute_id')->constrained('unit_institutes')->cascadeOnDelete();
           
            $table->string('vidio')->nullable();
            $table->string('word')->nullable();  
            $table->string('muhadara')->nullable();  
            $table->string('values')->nullable();  
            $table->string('plan')->nullable();  
            $table->string('goals')->nullable();  
 
                
            $table->integer('number')->nullable();       
            $table->integer('employees')->nullable();       
            $table->integer('classrooms')->nullable();         
            $table->integer('graduates')->nullable();        
            
            
            $table->string('academic_council')->nullable();     
            $table->string('structure')->nullable();         
            $table->string('strategy')->nullable();         
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
