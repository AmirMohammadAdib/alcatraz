<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject',
        'description',
        'file',
        'periority',
        'seen',
        'user_id',
        'admin_id',
        'ticket_id',
        'status',
    ];
    const VIEW_ANY_PERMISSION_KEY = 'ticket_view_any';
    const CREATE_PERMISSION_KEY = 'ticket_create';
    const DESTROY_PERMISSION_KEY = 'ticket_destroy';
    const VIEW_PERMISSION_KEY = 'ticket_view';
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function admin(){
        return $this->belongsTo(User::class);
    }
    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public function children(){
        return $this->hasMany($this, 'ticket_id')->with('children');
    }
}
