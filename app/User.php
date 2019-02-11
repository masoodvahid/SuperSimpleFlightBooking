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
      'password' => '$2y$10$llr96JeCqLRRoMYg/H7LzOtBrfyEQtj6b64pd.pNYel/V5N0RI5te'
    );

    public function flights()
    {
        return $this->belongsToMany('App\Flight')->withPivot('user_comment', 'admin_comment')->withTimestamps();
    }

}
