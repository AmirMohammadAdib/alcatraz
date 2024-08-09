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
    const VIEW_ANY_PERMISSION_KEY = 'withdraw_view_any';
    const UPDATE_PERMISSION_KEY = 'withdraw_update';
    const DESTROY_PERMISSION_KEY = 'withdraw_destroy';


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
