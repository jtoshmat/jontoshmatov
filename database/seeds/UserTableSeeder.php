<?php

use Illuminate\Database\Seeder;
use app\User;
use app\Group;
use app\Organization;
use app\District;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        //DB::table('users')->delete();


        // Create Users

        $users[] = User::create(array(
                'first_name' => 'Jon',
                'last_name' => 'Toshmatov',
                'type' => 1,
                'username' => 'toshmatov',
                'gender' => 'male',
                'email' => 'jontoshmatov@yahoo.com',
                'password' => Hash::make('business'),
            ));

        $users[] = User::create(array(
                'first_name' => 'Stefanie',
                'last_name' => 'Arellano',
                'type' => 1,
                'username' => 'sarellano',
                'gender' => 'female',
                'email' => 'zoda92@gmail.com',
                'password' => Hash::make('iloveyou'),
            ));


        $this->command->info('Users are seeded');

    }

}
