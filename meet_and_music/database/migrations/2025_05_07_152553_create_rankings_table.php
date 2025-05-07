<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingsTable extends Migration
{
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relaciona com o usuário
            $table->integer('rank')->default(0); // Ranking do usuário, baseado no nível
            $table->integer('xp')->default(0); // XP atual do usuário (para ranking)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rankings');
    }
}
