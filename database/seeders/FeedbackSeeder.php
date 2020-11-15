<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feedbacks')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'name' => $faker->realText(10),
                'comment' => $faker->realText(100),
            ];
        }
        return $data;
    }
}
