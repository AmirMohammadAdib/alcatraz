<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deposit extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id', 'type', 'status', 'transaction_code', 'receipt', 'amount'
    ];
    const VIEW_ANY_PERMISSION_KEY = 'deposit_view_any';
    const VIEW_PERMISSION_KEY = 'deposit_view';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
