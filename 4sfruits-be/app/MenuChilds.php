<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuChilds extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id'];

    function parent() {
        return $this->belongsTo(Menu::class);
    }
}
