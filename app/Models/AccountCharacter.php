<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCharacter extends Model
{
    use HasFactory;
    protected $table = 'account_characters';
    protected $fillable = ['account_id', 'character_id'];

    
}
