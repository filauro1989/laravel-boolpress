<?php

namespace App\Model;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // RELAZIONE ONE TO MANY
    public function posts() {
        return $this->hasMany('App\Model\Post');
    }

    public function createSlug($title)
    {
        $slug = Str::slug($title, '-');

        $oldcategory = Category::where('slug', $slug)->first();

        $counter = 0;
        while ($oldcategory) {
            $newSlug = $slug . '-' . $counter;
            $oldcategory = Category::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }
}
