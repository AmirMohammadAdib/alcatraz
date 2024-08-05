<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
            return 'images/profiles/defaults/' . $this->profile;
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
