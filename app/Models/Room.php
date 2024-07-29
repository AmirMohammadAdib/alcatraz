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

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
