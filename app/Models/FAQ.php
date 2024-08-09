<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FAQ extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    const VIEW_ANY_PERMISSION_KEY = 'faq_view_any';
    const CREATE_PERMISSION_KEY = 'faq_create';
    const UPDATE_PERMISSION_KEY = 'faq_update';
    const DESTROY_PERMISSION_KEY = 'faq_destroy';
    const VIEW_PERMISSION_KEY = 'faq_view';
    
    protected $fillable = ['question', 'answare'];
}
