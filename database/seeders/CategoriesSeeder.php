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

        $categories = [
            'Авто',
            'Спорт',
            'Здоровье',
            'Игры',
            'Политика',
            'Кино',
            'Технологии',
            'Культура',
            'Музыка',
        ];

        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'name' => $category,
                'description' => $faker->realText(100),
                'photo' => $faker->imageUrl(),
            ];
        }
        return $data;
    }
}
