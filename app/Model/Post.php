<?php

namespace App\Model;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'author',
        'content',
        'slug',
        'created_at',
        'updated_at',
        'category_id',
        'user_id',
    ];

    // APPARTIENE A USER RELAZIONE ONE TO MANY
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    // APPARTIENE A TAG RELAZIONE MANY TO MANY
    public function tags() {

        return $this->belongsToMany('App\Model\Tag')->withTimestamps();
    }

    public function category() {
        return $this->belongsTo('App\Model\Category');
    }

    // FUNZIONE CHE PERMETTE DI USARE LO SLUG COME CHIAVE NELL URL
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function createSlug($title)
    {
        $slug = Str::slug($title, '-');

        $oldPost = Post::where('slug', $slug)->first();

        $counter = 0;
        while ($oldPost) {
            $newSlug = $slug . '-' . $counter;
            $oldPost = Post::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }
}
