<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'img'];
    const VIEW_ANY_PERMISSION_KEY = 'gun_view_any';
    const CREATE_PERMISSION_KEY = 'gun_create';
    const UPDATE_PERMISSION_KEY = 'gun_update';
    const DESTROY_PERMISSION_KEY = 'gun_destroy';
    
    public function accounts(){
        return $this->hasMany(Account::class);
    }
}
