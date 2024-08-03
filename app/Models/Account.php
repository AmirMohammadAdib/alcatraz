<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title', 'img', 'price', 'description', 'status', 'gun_id'
    ];


    public function orders()
    {
        return $this->hasMany(CpOrder::class);
    }
}
