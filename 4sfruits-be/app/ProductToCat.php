<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductToCat extends Model
{
    protected $fillable = ['product_id', 'cat_id'];
}
