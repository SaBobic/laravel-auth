<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();
        $user->name = 'Fabrizio';
        $user->email = 'fabrizioettori@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        for ($i = 0; $i < 4; $i++) {
            $new_user = new User();
            $new_user->name = $faker->userName();
            $new_user->email = $faker->freeEmail();
            $new_user->password = bcrypt('password');
            $new_user->save();
        };

    }
}
