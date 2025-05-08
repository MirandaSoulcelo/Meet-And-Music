<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Usado para garantir que o password será tratado como um valor 'hashed'
    ];
        public function xp()
    {
        return $this->hasOne(User_xp::class, 'user_id');
    }


    public static function boot()
{
    parent::boot();

    static::created(function ($user) {
        User_xp::create([
            'user_id' => $user->id,
            'xp_atual' => 0,
            'nivel_atual' => 1,
        ]);
    });
}

public function usuarioXp()
{
    return $this->hasOne(User_xp::class);
}

}
