<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountGun extends Model
{
    use HasFactory;
    protected $table = 'account_gun';
    protected $fillable = ['account_id', 'gun_id'];

    
}
