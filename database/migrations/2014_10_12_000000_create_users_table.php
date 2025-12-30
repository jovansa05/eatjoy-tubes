<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nickname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->decimal('current_weight', 5, 2);
            $table->decimal('target_weight', 5, 2);
            $table->enum('subscription_plan', ['free', 'starter', 'starter_plus'])->default('free');
            $table->date('subscription_ends_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
