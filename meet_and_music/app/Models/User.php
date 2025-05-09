<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function xp()
    {
        return $this->hasOne(User_xp::class, 'user_id');
    }

    // Método para adicionar XP
    public function adicionarXpParaUsuario($xp)
    {
        // Verifica se o usuário tem um registro de XP
        $userXp = $this->xp;

        if ($userXp) {
            $userXp->adicionarXP($xp);  // Chama o método adicionarXP no modelo User_xp
        } else {
            // Caso não exista, cria um novo registro de XP para o usuário
            User_xp::create([
                'user_id' => $this->id,
                'xp_atual' => $xp,
                'nivel_atual' => 1,
            ]);
        }
    }
}
