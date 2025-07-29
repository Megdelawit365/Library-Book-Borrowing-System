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
        Schema::dropIfExists("borrows");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('student_id')->references('id')->on('students');
            $table->foreignId('book_id')->references('id')->on('books');
            $table->dateTime('borrowed_at');
            $table->dateTime('returned_at')->default(null);
        });
    }
};
