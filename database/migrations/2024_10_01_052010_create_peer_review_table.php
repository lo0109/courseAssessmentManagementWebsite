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
            $table->foreignId('reviewee_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('reviewer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('assessment')->constrained('assessments')->onDelete('cascade');   
            $table->foreignId('type_id')->constrained('peer_review_types')->onDelete('cascade');
            $table->tinyInteger('score');
            $table->text('comment');
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
