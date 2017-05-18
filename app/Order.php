<?php

namespace AlMohaseb;

use AlMohaseb\Agent;
use AlMohaseb\Product;
use AlMohaseb\Customer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $with = ['products'];

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

    public function scopeSelling($query)
    {
        return $query->where('responsible_type', Customer::class);
    }

    public function scopePurchasing($query)
    {
        return $query->where('responsible_type', Agent::class);
    }

    public function calcualteTotalPrice()
    {
        $price = 0;

        foreach ($this->products as $product) {
            for($i = 0; $i < $product->pivot->quantity; $i++) {
                $price += ($this->responsible_type === Customer::class) ? $product->sellingPrice : $product->buyingPrice;
            }
        }

        return $price;
    }
}
