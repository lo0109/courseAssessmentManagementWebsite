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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('course_id', 7);
            $table->foreignId('typeID')->constrained('assessment_types')->onDelete('cascade');
            $table->text('title');
            $table->text('instruction');
            $table->tinyInteger('score')->nullable();
            $table->tinyInteger('maxScore');
            $table->dateTime('deadline');
            $table->tinyInteger('reviewNumber');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('assessments');
    }
};
