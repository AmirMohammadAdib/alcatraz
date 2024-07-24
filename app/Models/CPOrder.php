<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CPOrder extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cp_orders';

    protected $fillable = [
        'user_id', 'cp_id', 'payment_id', 'status', 'type', 'expire_time', 'email', 'password'
    ];

    public function cp()
    {
        return $this->belongsTo(Cp::class);
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
