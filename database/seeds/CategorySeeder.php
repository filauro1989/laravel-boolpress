<?php
use Faker\Generator as Faker;

use App\Model\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 8; $i++) {

            $newCategory = new Category();
            $newCategory->name = $faker->word();
            $title = "$newCategory->name-$i";
            $newCategory->slug = Str::slug($title, '-');
            $newCategory->save();
        }
    }
}
