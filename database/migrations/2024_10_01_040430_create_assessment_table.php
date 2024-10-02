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
            $table->string('courseID');
            $table->foreignId('typeID')->constrained('assessment_type')->onDelete('cascade');
            $table->text('title');
            $table->text('instruction');
            $table->tinyInteger('score')->nullable();
            $table->tinyInteger('maxScore');
            $table->dateTime('deadline');
            $table->tinyInteger('reviewNumber');
            $table->string('sID')->nullable();
            $table->foreign('courseID')->references('courseID')->on('courses');
            $table->foreign('sID')->references('sNumber')->on('students');
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
