<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Customer;


$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'identification_type' => $faker->title,
        'identification_number' => $faker->e164PhoneNumber,
        'email' => $faker->email,
    ];
});