<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_xp extends Model
{
    protected $table = 'usuarios_xp';  // Especifica o nome correto da tabela

    protected $fillable = ['user_id', 'xp_atual', 'nivel_atual'];



    public function adicionarXP($xpGanho)
    {
        $this->xp_atual = intval($this->xp_atual) + intval($xpGanho); 
    
       
        while ($this->xp_atual >= 100) {
            $this->nivel_atual++; 
            $this->xp_atual -= 100; 
        }
    
        $this->save();
    }


   
}
