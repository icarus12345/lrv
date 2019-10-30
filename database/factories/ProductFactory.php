<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'category_id' => Category::inRandomOrder()->first()->id, 
        'name_vi' => $faker->name, 
		'name_en' => $faker->name,
		'desc_vi' => $faker->text,
		'desc_en' => $faker->text,
		'price' => $faker->randomFloat(2),
		'content_en' => $faker->paragraphs(),
		'content_vi' => $faker->paragraphs(),
		'type' => 'gid',
    ];
});
