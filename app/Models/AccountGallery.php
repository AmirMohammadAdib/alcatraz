<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountGallery extends Model
{
    use HasFactory;
    protected $table = 'account_gallery';
    protected $fillable = ['account_id', 'gallery_id'];
}
