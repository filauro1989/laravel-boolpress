<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function posts() {
        return $this->hasMany('App\Model\Post');
    }
}
