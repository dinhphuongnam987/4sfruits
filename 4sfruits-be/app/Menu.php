<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'slug'];

    public function childs() {
        return $this->hasMany('App\MenuChilds', 'parent_id');
    }
}
