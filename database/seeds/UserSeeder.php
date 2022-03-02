<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $newUser = new User();
        $newUser->name = 'Admin';
        $newUser->email = 'filauro@gmail.com';
        $string = 'filauro1989';
        $newUser->password = Hash::make($string);
        $newUser->save();
        
        for ($i=0; $i < 10; $i++) { 

            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();

            // Creo una stringa per la password
            $string = '215_maggio';
            // cripto la password
            $newUser->password = Hash::make($string);
            $newUser->save();
        }
    }
}
