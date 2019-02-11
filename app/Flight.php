<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'from', 'to', 'date', 'capacity', 'class', 'status',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('user_comment', 'admin_comment')->withTimestamps();
    }

}
