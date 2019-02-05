<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'from', 'to', 'date', 'capacity', 'class', 'status',
    ];

    public function reserved_flight()
    {
        return $this->hasMany('App\Reserved_flight', 'flight_id', 'id');
    }

}
