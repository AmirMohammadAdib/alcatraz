<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountOrder extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id', 'account_id', 'payment_id', 'receipt', 'description', 'status', 'email', 'password'
    ];
    const VIEW_ANY_PERMISSION_KEY = 'account_order_view_any';
    const UPDATE_PERMISSION_KEY = 'account_order_update';
    const DESTROY_PERMISSION_KEY = 'account_order_destroy';
    const VIEW_PERMISSION_KEY = 'account_order_view_history';



    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
