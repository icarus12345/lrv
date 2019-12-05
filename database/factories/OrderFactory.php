<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'name' => $faker->name,  
        'company' => $faker->company, 
        'email' => $faker->email,  
        'street_address' => $faker->address,
        'state_city' => $faker->state,
        'country'=> $faker->country,
        'city' => $faker->city,
        'postcode_zip' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'amount' => 0,
        'tax_amount' => 0,
        'flat_rate' => 0,
        'ship_amount' => 0,
        'discount' => rand(1,5) * 10,
        'discount_amount' => 0,
        'total_amount'  => 0,
        'billing_amount'  => 0,
        'total_item'  => 0,
        'currency' => 'VND',
        'status' => 'Requested'
    ];
});
$factory->afterCreating(Order::class, function ($order, $faker) {
    $item = rand(1,5);
    for($i = 0; $i<$item; $i++){
        $qty = rand(1,10);
        $product =  Product::inRandomOrder()->first();
        OrderDetail::create([
            'order_id'  => $order->id,
            'product_id'=> $product->id, 
            'color' => $faker->randomElement(['Red','Green','Yellow','Black']), 
            'size'  => $faker->randomElement(['S','M','L','XL','Small','Big']), 
            'qty' => $qty, 
            'price' => $product->price,
            'price_with_discount'  => $product->price_with_discount,
            'discount' => $product->discount,
            'amount' => $product->price_with_discount * $qty,
        ]);
    }
});