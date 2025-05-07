<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade'); // Relaciona com o módulo
            $table->integer('order')->default(0); // Ordem das lições dentro do módulo
            $table->integer('points')->default(0); // XP ganho ao completar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
