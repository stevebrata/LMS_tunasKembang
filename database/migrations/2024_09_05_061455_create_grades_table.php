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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('teacher');
            $table->string('assistant');
            // $table->foreignId('subject_id')->constrained(
            //     table: 'subjects', indexName: 'grades_subject_id'
            // );
            // $table->foreignId('teacher_id')->constrained(
            //     table: 'teachers', indexName: 'grades_teacher_id'
            // );
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
