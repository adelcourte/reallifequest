<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function friends(){
        return $this->hasMany("App\Quest", "idSender")->where("state", "==", "friend");
    }

    public function received_fr(){
        return $this->hasMany("App\Friendship", "idReceiver")->where("state", "==", "pending")->get();
    }

    public function sent_fr(){
        return $this->hasMany("App\Friendship", "idSender");
    }

    public function received_q(){
        return $this->hasMany("App\Quest", "idReceiver");
    }

    public function sent_q(){
        return $this->hasMany("App\Quest", "idSender");
    }

}
