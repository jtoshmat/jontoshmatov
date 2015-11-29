<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use app\Flip;


class FlipTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('flips')->delete();
        for ($i = 1; $i <= 5; ++$i) {
            $flips[$i] = \app\Flip::create(array(
                    'title' => 'Flip Title ' . rand(100, 900),
                    'description' => 'Description: '.$i.$faker->paragraph(1),
                ));

            $this->command->info('Flip: "'.$flips[$i]->title.'" created!');
        }

    }
}
