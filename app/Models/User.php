<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'phone',
        'username',
        'level',
        'role',
        'status',
        'wallet',
        'award_wallet',
        'cart_number',
        'shabba_number',
        'password',
        'profile'
    ];

    const VIEW_ANY_PERMISSION_KEY = 'user_view_any';
    const CREATE_PERMISSION_KEY = 'user_create';
    const UPDATE_PERMISSION_KEY = 'user_update';
    const DESTROY_PERMISSION_KEY = 'user_destroy';
    const SYNC_ROLES_PERMISSIONS_KEY = 'user_sync_role';
    const VIEW_PERMISSION_KEY = 'user_view';

    public function accountOrders()
    {
        return $this->hasMany(AccountOrder::class);
    }

    public function buyAccounts()
    {
        return $this->hasMany(BuyAccount::class);
    }

    public function cpOrders()
    {
        return $this->hasMany(CpOrder::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function profile(){
        if($this->profile == null){
            return 'asset/src/svg/user-1.svg';
        }else{
            return 'images/profiles/' . $this->profile;
        }
    }

    public function level(){
        $player = $this;
        if($player->level == '0'){
            return 'نوب';
        }elseif($player->level == '1'){
            return 'پلیر';
        }elseif($player->level == '2'){
            return 'پرو پلیر';
        }else{
            return 'اولترا پلیر';
        }
    }
}
