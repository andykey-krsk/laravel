<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Faker\Factory::create('ru_RU');

        $categories = \DB::select('SELECT id FROM categories');

        $sources = \DB::select('SELECT id FROM sources');

        $data = [];

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'title' => $faker->realText(50),
                'short_text' => $faker->realText(100),
                'full_text' => $faker->realText(500),
                'photo' => $faker->imageUrl(),
                'category_id' => $categories[array_rand($categories)]->id,
                'source_id' => $sources[array_rand($sources)]->id,
            ];
        }
        return $data;
    }
}
