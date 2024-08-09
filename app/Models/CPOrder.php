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
    const VIEW_ANY_PERMISSION_KEY = 'cp_order_view_any';
    const UPDATE_PERMISSION_KEY = 'cp_order_update';
    const DESTROY_PERMISSION_KEY = 'cp_order_destroy';
    const VIEW_PERMISSION_KEY = 'cp_order_view_history';
    
    public function cp()
    {
        return $this->belongsTo(CP::class);
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
