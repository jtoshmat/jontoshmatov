<?php

use Illuminate\Database\Seeder;
use app\Game;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('games')->delete();
        for ($i = 1; $i <= 5; ++$i) {
            $games[$i] = Game::create(array(
                'title' => 'Game Title ' . rand(100, 900),
                'description' => 'Description: '.$i.$faker->paragraph(1),
            ));

            $this->command->info('Game: "'.$games[$i]->title.'" created!');
        }
    }
}
