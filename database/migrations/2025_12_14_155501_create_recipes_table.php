<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('calories');
            $table->json('ingredients')->nullable(); // Ubah ke json
            $table->json('instructions')->nullable(); // Ubah ke json
            $table->integer('cooking_time')->nullable(); // Tambahkan ini
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('medium'); // Tambahkan ini
            $table->string('image')->nullable();
            $table->enum('type', ['regular', 'premium'])->default('regular');
            $table->enum('visibility', ['public', 'private'])->default('public');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
