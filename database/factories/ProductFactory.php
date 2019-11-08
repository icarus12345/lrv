<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductColor;
use App\Models\Size;
use App\Models\ProductSize;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => Category::inRandomOrder()->first()->id, 
        'name_vi' => $faker->name, 
		'name_en' => $faker->name,
		'desc_vi' => $faker->text(191),
		'desc_en' => $faker->text(191),
		'instock' => rand(10,50),
		'instock' => rand(0,150),
		'discount' => rand(0,50),
		'price' => rand(100,500)*1000,
		'content_en' => $faker->paragraph(),
		'content_vi' => $faker->paragraph(),
		'labels' => [$faker->randomElement(['new','hot','sale'])],
		'type' => 'gid',
    ];
});
$factory->afterCreating(Product::class, function ($product, $faker) {
    $colors = Color::all();
	foreach($colors as $color){
		ProductColor::create([
			'product_id' => $product->id,
			'color_id' => $color->id,
			]);
	}
	$sizes = Size::all();
	foreach($sizes as $size){
		ProductSize::create([
			'product_id' => $product->id,
			'size_id' => $size->id,
			]);
	}
});