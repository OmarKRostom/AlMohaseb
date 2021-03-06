<?php

namespace AlMohaseb;

use Illuminate\Database\Eloquent\Model;
use AlMohaseb\{Agent, Customer, Order, Option, Category};

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'buyingPrice', 'sellingPrice', 'category_id', 'available_in_stock'
    ];

    //RELATION BETWEEN PRODUCT AND ORDER
    public function order() {
    	return $this->belongsToMany(Order::class)->withPivot('quantity', 'price');
    }

    //RELATION BETWEEN PRODUCT AND OPTIONS
    public function option() {
    	return $this->hasMany(Option::class);
    }

    //RELATION BETWEEN PRODUCT AND CATEGORY
    public function category() {
    	return $this->belongsTo(Category::class);
    }
}

