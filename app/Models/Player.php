<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id', 'room_id', 'status'
    ];
    const VIEW_ANY_PERMISSION_KEY = 'player_view_any';
    const UPDATE_PERMISSION_KEY = 'player_update';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
