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
        Schema::create('master_degrees', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name');
            $table->string('doctor_image');
            $table->string('massage_type');
            $table->string('massage_pdf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_degrees');
    }
};
