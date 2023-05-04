<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['thumbnail', 'url_image', 'title', 'slug', 'user', 'description'];
}
