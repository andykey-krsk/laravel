<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'category' => $faker->realText(50),
                'description' => $faker->realText(100),
                'photo' => $faker->imageUrl(),
            ];
        }
        return $data;
    }
}
