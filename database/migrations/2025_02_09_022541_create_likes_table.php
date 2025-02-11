<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('chirp_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Ensuring a user can like a chirp only once
            $table->unique(['user_id', 'chirp_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};

