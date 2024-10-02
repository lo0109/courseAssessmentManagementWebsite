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
        Schema::create('enrollment', function (Blueprint $table) {
            // $table->id();
            $table->string('sNumber');
            $table->string('courseID');
            $table->tinyinteger('workshop');
            $table->foreign('sNumber')->references('sNumber')->on('students');
            $table->foreign('courseID')->references('courseID')->on('courses');
            $table->primary(['sNumber', 'courseID']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('enrollment');
    }
};
