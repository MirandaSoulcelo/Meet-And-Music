<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class User_xp extends Model
{
    protected $table = 'usuarios_xp';  

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

        public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
