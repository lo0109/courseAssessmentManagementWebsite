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
        Schema::create('peer_review', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessmentID')->constrained('assessments')->onDelete('cascade');
            $table->foreignId('typeID')->constrained('peer_review_type')->onDelete('cascade');
            $table->string('revieweeID');
            $table->string('sNumber');
            $table->string('score');
            $table->text('comment');
            $table->foreign('revieweeID')->references('sNumber')->on('students');
            $table->foreign('sNumber')->references('sNumber')->on('students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('peer_review');
    }
};
