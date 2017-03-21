<?php

namespace AlMohaseb;

use Illuminate\Database\Eloquent\Model;
use AlMohaseb\Product;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    //RELATION BETWEEN OPTION AND PRODUCT
    public function product() {
    	return $this->hasMany(Product::class);
    }
}
