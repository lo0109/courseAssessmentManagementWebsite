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
        Schema::create('courses', function (Blueprint $table) {
            $table->string('courseID')->primary();
            $table->string('name');
            $table->text('description');
            $table->boolean('online');
            $table->tinyInteger('workshop');
            $table->string('teacherID');
            $table->foreign('teacherID')->references('tID')->on('teachers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('courses');
    }
};
