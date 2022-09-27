<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Fabrizio';
        $user->email = 'fabrizioettori@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
    }
}
