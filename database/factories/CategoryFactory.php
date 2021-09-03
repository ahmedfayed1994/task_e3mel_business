<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1),
        'status' => 1,
        'created_at' => $faker->dateTimeBetween('-3 months'),
    ];
});
