<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'thumbnail', 'url_image', 'name', 'slug', 'unit','price', 'description'
    ];

    public function cats() {
        return $this->belongsToMany('App\ProductCat', 'product_to_cats', 'product_id', 'cat_id');
    }
}
