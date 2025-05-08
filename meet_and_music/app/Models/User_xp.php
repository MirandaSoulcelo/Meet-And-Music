<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_xp extends Model
{
    protected $table = 'usuarios_xp';  // Especifica o nome correto da tabela

    protected $fillable = ['user_id', 'xp_atual', 'nivel_atual'];

    public function adicionarXP($xpGanho)
{
    $this->xp_atual += $xpGanho;  // Soma o valor do XP ao atual

    // Lógica para aumentar o nível
    while ($this->xp_atual >= $this->xpNecessarioParaProximoNivel()) {
        $this->xp_atual -= $this->xpNecessarioParaProximoNivel();  // Subtrai o XP necessário para o próximo nível
        $this->nivel_atual++;  // Aumenta o nível
    }

    // Salva as alterações no banco
    $this->save();
}


    private function xpNecessarioParaProximoNivel()
    {
        return 100 * $this->nivel_atual; // Cada nível precisa de 100 XP a mais
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
