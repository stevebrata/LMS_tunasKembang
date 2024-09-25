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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->string('score');
            $table->boolean('is_done')->default(0);
            $table->foreignId('test_id')->constrained(
                table: 'tests', indexName: 'scores_test_id'
            );
            $table->foreignId('student_id')->constrained(
                table: 'students', indexName: 'scores_student_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
