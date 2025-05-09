<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_xp extends Model
{
    protected $table = 'usuarios_xp';  // Especifica o nome correto da tabela

    protected $fillable = ['user_id', 'xp_atual', 'nivel_atual'];



    public function adicionarXP($xpGanho)
{
    $this->xp_atual = intval($this->xp_atual); // Força para inteiro
    $xpGanho = intval($xpGanho);               // Força para inteiro

    $this->xp_atual += $xpGanho;

    while ($this->xp_atual >= $this->xpNecessarioParaProximoNivel()) {
        $this->xp_atual -= $this->xpNecessarioParaProximoNivel();
        $this->nivel_atual++;
    }

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
