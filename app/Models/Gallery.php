<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['img'];
    const VIEW_ANY_PERMISSION_KEY = 'gallery_view_any';
    const CREATE_PERMISSION_KEY = 'gallery_create';
    const DESTROY_PERMISSION_KEY = 'gallery_destroy';

}
