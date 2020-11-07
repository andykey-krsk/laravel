<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sources')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->realText(10),
                'description' => $faker->realText(100),
                'url' => $faker->imageUrl(),
            ];
        }
        return $data;
    }
}
