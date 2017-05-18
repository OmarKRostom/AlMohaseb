<?php

namespace AlMohaseb;

use AlMohaseb\Agent;
use AlMohaseb\Product;
use AlMohaseb\Customer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function responsible()
    {
        return $this->morphTo();
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
