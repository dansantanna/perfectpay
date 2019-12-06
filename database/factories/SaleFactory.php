<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->randomFloat(2, 0, 100),
    ];
});

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'identification_type' => $faker->title,
        'identification_number' => $faker->e164PhoneNumber,
        'email' => $faker->email,
    ];
});

$factory->define(Sale::class, function (Faker $faker) use ($factory) {
    return [
        'quantity' => $faker->randomNumber(3),
        'sale_amount' => $faker->randomFloat(2, 2, 8),
        'discount' => $faker->randomFloat(2, 2, 10),
        'status' => $faker->name,
        'product_id' => factory('App\Models\Product'),
        'customer_id' => factory('App\Models\Customer'),
    ];
});
