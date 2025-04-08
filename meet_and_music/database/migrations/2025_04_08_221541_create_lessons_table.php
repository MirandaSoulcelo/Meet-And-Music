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
            // database/migrations/xxxx_xx_xx_create_lessons_table.php
    Schema::create('lessons', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('level');
        $table->string('duration');
        $table->integer('lessons_count');
        $table->string('image')->nullable();
        $table->boolean('is_locked')->default(false);
        $table->json('content')->nullable(); // para tópicos e próximas lições
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
