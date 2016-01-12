<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 5; ++$i) {
            $posts[$i] = \App\Post::create(array(
                'title' => 'Posts ' . rand(100, 900),
                'description' => 'desc: '.$i.$faker->paragraph(1),
            ));

            $this->command->info('Posts: "'.$posts[$i]->title.'" created!');
        }

    }
}
