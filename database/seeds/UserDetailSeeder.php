<?php

use App\Models\UserDetail;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach ($users as $user) {
            $new_user_details = new UserDetail();
            $new_user_details->user_id = $user->id;
            $new_user_details->first_name = $faker->firstName();
            $new_user_details->last_name = $faker->lastName();
            $new_user_details->phone = $faker->phoneNumber();
            $new_user_details->address = $faker->streetName();
            $new_user_details->birth_year = $faker->year();
            $new_user_details->save();
        }
    }
}
