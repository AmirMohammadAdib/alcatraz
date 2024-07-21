<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'amount', 'user_id', 'status', 'transaction_id', 'gateway', 'bank_first_response', 'bank_second_response'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountOrders()
    {
        return $this->hasMany(AccountOrder::class);
    }

    public function cpOrders()
    {
        return $this->hasMany(CpOrder::class);
    }
}
