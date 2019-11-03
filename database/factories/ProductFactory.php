<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => Category::inRandomOrder()->first()->id, 
        'name_vi' => $faker->name, 
		'name_en' => $faker->name,
		'desc_vi' => $faker->text(191),
		'desc_en' => $faker->text(191),
		'instock' => rand(10,50),
		'instock' => rand(0,50),
		'price' => rand(100,500)*1000,
		'content_en' => $faker->paragraph(),
		'content_vi' => $faker->paragraph(),
		'label' => $faker->randomElement(['new','hot',null]),
		'type' => 'gid',
    ];
});
