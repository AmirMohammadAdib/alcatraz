<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'link', 'fee', 'award', 'award_type', 'type', 'capacity', 'players', 'status', 'title', 'img'
    ];

    const VIEW_ANY_PERMISSION_KEY = 'room_view_any';
    const CREATE_PERMISSION_KEY = 'room_create';
    const UPDATE_PERMISSION_KEY = 'room_update';
    const DESTROY_PERMISSION_KEY = 'room_destroy';


    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
