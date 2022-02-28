<?php
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Model\Post;php

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->sentence(3, true);
            $newPost->author = $faker->name();
            $newPost->content = $faker->paragraphs(6, true);
            $newPost->slug = Str::slug($newPost->title . '-' . $i, '-');
            $newPost->save();
        }
    }
}
