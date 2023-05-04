<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostToUser extends Model
{
    protected $fillable = ['post_id', 'user_id'];
}
