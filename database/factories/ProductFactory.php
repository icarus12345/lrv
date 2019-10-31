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
		'price' => $faker->randomFloat(2),
		'content_en' => $faker->paragraph(),
		'content_vi' => $faker->paragraph(),
		'type' => 'gid',
    ];
});
