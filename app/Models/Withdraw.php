<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Withdraw extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'status', 'transaction_code', 'receipt', 'amount', 'cart_number_freezer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
