<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CP extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cps';
    protected $fillable = [
        'title', 'amount', 'img', 'cover', 'price', 'super_price', 'status', 'super_status_sale'
    ];

    const VIEW_ANY_PERMISSION_KEY = 'cp_view_any';
    const CREATE_PERMISSION_KEY = 'cp_create';
    const UPDATE_PERMISSION_KEY = 'cp_update';
    const DESTROY_PERMISSION_KEY = 'cp_destroy';


    public function orders()
    {
        return $this->hasMany(CpOrder::class);
    }
}
