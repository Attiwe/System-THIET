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
        Schema::create('institute_board_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_members_id')->constrained('faculty_members')->cascadeOnDelete();
            $table->enum('type', ['دكتور', 'معيد' ,'رئيس مجلس اداره','العميد']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_board_members');
    }
};
