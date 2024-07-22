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
        'title', 'amount', 'img', 'cover', 'price', 'super_price', 'status'
    ];

    public function orders()
    {
        return $this->hasMany(CpOrder::class);
    }
}
