<?php

namespace AlMohaseb;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone'
    ];

    //RELATION BETWEEN AGENT AND ORDER
    public function order() {
    	return $this->hasMany(Order::class);
    }
}
