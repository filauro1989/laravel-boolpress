<?php

namespace App\Model;

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

    public function categories() {
        return $this->belongsTo('App\Model\Category');
    }

    // FUNZIONE CHE PERMETTE DI USARE LO SLUG COME CHIAVE NELL URL
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
