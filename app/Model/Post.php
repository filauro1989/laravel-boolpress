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
        'updated',
    ];

    // FUNZIONE CHE PERMETTE DI USARE LO SLUG COME CHIAVE NELL URL
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
