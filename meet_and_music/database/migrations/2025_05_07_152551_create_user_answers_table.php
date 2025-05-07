<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relaciona com o usuário
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade'); // Relaciona com a pergunta
            $table->foreignId('alternative_id')->constrained('alternatives')->onDelete('cascade'); // Relaciona com a alternativa escolhida
            $table->boolean('is_correct')->default(false); // Resposta correta ou não
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_answers');
    }
}
