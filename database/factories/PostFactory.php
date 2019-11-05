<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => Category::inRandomOrder()->first()->id, 
        'title_vi' => $faker->paragraph(1), 
		'title_en' => $faker->paragraph(1),
		'desc_vi' => $faker->text(191),
		'desc_en' => $faker->text(191),
		'content_vi' => $faker->paragraph(5),
		'content_en' => $faker->paragraph(5),
    ];
});
