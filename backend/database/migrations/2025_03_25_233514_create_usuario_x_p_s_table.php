<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('usuarios_xp', function (Blueprint $table) {  // Alterei de 'user_xps' para 'usuarios_xp'
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('xp_atual')->default(0);
            $table->integer('nivel_atual')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_xp');
    }
};
