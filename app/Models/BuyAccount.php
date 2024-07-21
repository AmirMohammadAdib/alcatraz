<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuyAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'game_uid', 'saler_price', 'description', 'site_price', 'transaction_id', 'email', 'password', 'status', 'user_confirm'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

