<?php

namespace AlMohaseb;

use Illuminate\Database\Eloquent\Model;
use AlMohaseb\Product;

class Option extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'product_id'
    ];

    //RELATION BETWEEN OPTION AND PRODUCT
    public function product() {
    	return $this->belongsTo(Product::class);
    }
}
