<?php

namespace AlMohaseb;

use AlMohaseb\Order;
use AlMohaseb\Payment;
use Illuminate\Database\Eloquent\Model;

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

    public function payments()
    {
        return $this->morphMany(Payment::class, 'receivable');
    }
}
