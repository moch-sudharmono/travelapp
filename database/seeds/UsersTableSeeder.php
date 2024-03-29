<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();

        $faker = \Faker\Factory::create();

        $password = Hash::make('toptal');

        User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@example.com',
            'password'  => $password
        ]);

        for($i=0;$i < 50; $i++){
            User::create([
                'name'      => $faker->name,
                'email'     => $faker->email,
                'password'  => $password
            ]);
        }
    }
}
