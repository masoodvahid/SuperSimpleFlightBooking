<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserved_flight extends Model
{
    protected $fillable = [
        'user_id', 'flight_id', 'comment'
    ];

    public function flight()
    {
        return $this->belongsTo('App\Flight', 'flight_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
