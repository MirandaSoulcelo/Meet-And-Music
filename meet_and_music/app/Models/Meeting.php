<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'room_id',
        'title',
        'created_by',
        'status'
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    /**
     * Relacionamento com usuário criador
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    /**
     * Gerar link da chamada
     */
    public function getLinkAttribute()
    {
        return url("/video-call/{$this->room_id}");
    }
}