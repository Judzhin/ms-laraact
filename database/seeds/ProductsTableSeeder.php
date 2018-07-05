<?php

use Illuminate\Database\Seeder;

/**
 * Class ProductsTableSeeder
 * @code php artisan make:seeder ProductsTableSeeder
 */
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @code php artisan db:seed --class=ProductsTableSeeder
     */
    public function run()
    {
        /** @var \Faker\Generator $faker */
        $faker = \Faker\Factory::create();

        // Create 50 product records
        for ($i = 0; $i < 50; $i++) {
            \Laraact\Product::create([
                'title' => $faker->title,
                'description' => $faker->paragraph,
                'price' => $faker->randomNumber(2),
                'availability' => $faker->boolean(50)
            ]);
        }
    }
}
