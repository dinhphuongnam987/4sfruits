<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCat extends Model
{
    protected $fillable = ['name'];

    public function products() {
        return $this->belongsToMany('App\Product', 'product_to_cats', 'cat_id', 'product_id');
    }
}
