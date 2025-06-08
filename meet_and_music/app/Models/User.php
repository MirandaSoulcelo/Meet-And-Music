<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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

        public function sentFriendRequests()
    {
        return $this->belongsToMany(User::class, 'friend_user', 'user_id', 'friend_id')
                    ->withPivot('accepted')
                    ->withTimestamps();
    }

    public function receivedFriendRequests()
    {
        return $this->belongsToMany(User::class, 'friend_user', 'friend_id', 'user_id')
                    ->withPivot('accepted')
                    ->withTimestamps();
    }

    public function friends()
{

    $friendIds = DB::table('friend_user')
        ->where(function($query) {
            $query->where('user_id', $this->id)
                  ->where('accepted', true);
        })
        ->orWhere(function($query) {
            $query->where('friend_id', $this->id)
                  ->where('accepted', true);
        })
        ->select(
            DB::raw('CASE
                WHEN user_id = ' . $this->id . ' THEN friend_id
                WHEN friend_id = ' . $this->id . ' THEN user_id
                END as id'
            )
        )
        ->pluck('id');

    return User::whereIn('id', $friendIds);
}
    public function isFriendWith(User $user)
{
    return DB::table('friend_user')
        ->where(function($query) use ($user) {
            $query->where('user_id', $this->id)
                  ->where('friend_id', $user->id)
                  ->where('accepted', true);
        })
        ->orWhere(function($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->where('friend_id', $this->id)
                  ->where('accepted', true);
        })
        ->exists();
}
    // Método para verificar se há solicitação pendente
    public function hasPendingFriendRequestTo(User $user)
    {
        return $this->sentFriendRequests()
            ->where('friend_id', $user->id)
            ->where('accepted', false)
            ->exists();
    }

    public function hasPendingFriendRequestFrom(User $user)
    {
        return $this->receivedFriendRequests()
            ->where('user_id', $user->id)
            ->where('accepted', false)
            ->exists();
    }

        public function removeFriend(User $friend)
    {
        // Remove em ambas as direções
        $this->sentFriendRequests()->detach($friend->id);
        $this->receivedFriendRequests()->detach($friend->id);
    }
}
