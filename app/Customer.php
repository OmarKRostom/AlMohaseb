<?php

namespace AlMohaseb;

use Illuminate\Database\Eloquent\Model;
use AlMohaseb\Order;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone'
    ];

    //RELATION BETWEEN CUSTOMER AND ORDER
    public function orders() {
    	return $this->morphMany(Order::class, 'responsible');
    }
}
