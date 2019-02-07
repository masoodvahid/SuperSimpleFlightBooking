<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'code_melli', 'mobile', 'gender', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Sakhte Password 
    protected $attributes = array(
      'password' => '12345'
    );

    public function flights()
    {
        return $this->belongsToMany('App\Flight')->withPivot('user_comment', 'admin_comment')->as('reserved_flight')->withTimestamps();
    }

}
