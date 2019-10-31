<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => Category::inRandomOrder()->first()->id, 
        'title_vi' => $faker->name, 
		'title_en' => $faker->name,
		'content_vi' => $faker->text,
		'content_en' => $faker->text,
    ];
});
