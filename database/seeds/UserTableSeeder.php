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

        DB::table('users')->delete();
        DB::table('district_organization')->delete();
        DB::table('districts')->delete();
        DB::table('organizations')->delete();
        DB::table('groups')->delete();
        DB::table('child_guardian')->delete();
        DB::table('roleables')->delete();
        DB::table('games')->delete();
        DB::table('flips')->delete();

        for ($i = 1; $i <= 5; ++$i) {
            $districts[$i] = District::create(array(
                    'title' => 'Scnhool District ' . rand(100, 900),
                    'description' => 'District: '.$i.$faker->paragraph(1),
                ));

            $this->command->info('District: "'.$districts[$i]->title.'" created!');
        }

        for ($i = 1; $i <= 20; ++$i) {
            $organizations[$i] = Organization::create(array(
                    'title' => 'The ' . $faker->company . ' School',
                    'description' => 'Group: ' . $faker->paragraph(1),
                ));

            $organizations[$i]->districts()->save($districts[rand(1, 4)]);

            $this->command->info('Organization: '.$organizations[$i]->title.' was created!');
        }

        $group_array = ['Science', 'Math', 'Art', 'Chemistry', 'Music', 'Dance', 'Spanish', 'French', 'English', 'Language Arts', 'Pre-Algebra', 'Geometry', 'Woodshop', 'Drama', 'Grammar', 'Yearbook', 'Painting', 'Sculpture', 'Ceramics', 'Pottery', 'Band', 'Physics', 'Geology', 'Environmental Science', 'Calculus', 'Social Studies', 'US History', 'Sociology', 'Gymnastics'];

        for ($i = 1; $i <= 100; ++$i) {
            $groups[$i] = Group::create(array(
                    'organization_id' => $organizations[rand(1, 19)]->id,
                    'title' => $group_array[array_rand($group_array)] . ' ' . rand(1, 3) . '0' . rand(1, 9),
                    'description' => 'Class Description: ' . $faker->paragraph(1),
                ));

            $this->command->info('Group: "'. $groups[$i]->title .'" created!');
        }

        // Create Users

        $users[] = User::create(array(
                'first_name' => 'Jon',
                'last_name' => 'Toshmatov',
                'type' => 1,
                'username' => 'toshmatov',
                'gender' => 'male',
                'email' => 'jontoshmatov@yahoo.com',
                'password' => Hash::make('business'),
                'student_id' => 'jontoshmatov@yahoo.com',
            ));

        $users[] = User::create(array(
                'first_name' => 'Arron',
                'last_name' => 'Kallenberg',
                'type' => 1,
                'username' => 'kallena',
                'gender' => 'male',
                'email' => 'arron.kallenberg@gmail.com',
                'password' => Hash::make('business'),
                'student_id' => 'arron.kallenberg@gmail.com',
            ));

        $this->command->info('Creating superintendents!');
        $superintendents = $this->createUsers(20, $faker);

        foreach ($superintendents as $superintendent) {
            $superintendent->districts()->save($districts[rand(1, 5)], array('role_id' => rand(1, 2)));
        }

        $this->command->info('Creating principals!');
        $principals = $this->createUsers(100, $faker);

        foreach ($principals as $principal) {
            $principal->organizations()->save($organizations[rand(1, 20)], array('role_id' => rand(1, 2)));
        }

        $this->command->info('Creating teachers!');
        $teachers = $this->createUsers(100, $faker);

        foreach ($teachers as $teacher) {
            $teacher->groups()->save($groups[rand(1, 100)], array('role_id' => 1));
        }

        $this->command->info('Creating kids!');
        $kids = $this->createUsers(200, $faker);

        foreach ($kids as $kid) {
            $kid->groups()->save($groups[rand(1, 100)], array('role_id' => 3));
        }
    }

    private function createUsers($count, $faker)
    {
        for ($i = 1; $i <= $count; ++$i) {
            $first_name = $faker->firstName;
            $last_name = $faker->lastName;

            $email = strtolower($first_name.'.'.$last_name.'@'.$faker->safeEmailDomain);

            $users[$i] = User::create(array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'username' => str_slug($first_name . '_' . $last_name),
                    'gender' => rand(0, 1) ? 'male' : 'female',
                    'birthdate' => $faker->dateTimeBetween('-40 years', '-8 years'),
                    'email' => $email,
                    'password' => Hash::make('business'),
                    'student_id' => $faker->uuid,
                ));

            //$this->command->info($frist_name.' '.$last_name.' created!');
        }

        return $users;
    }
}
