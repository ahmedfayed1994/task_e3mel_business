<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Course::class, function (Faker $faker) {
    return [

        'category_id' => 1,
        'name' => $faker->sentence(2),
        'description' => $faker->realText(random_int(80, 100)),
        'rating' => random_int(1, 5),
        'views' => random_int(1, 300),
        'level' =>  $faker->randomElement(['beginner', 'immediate', 'high']),
        'hours' => random_int(10, 50),
        'status' => 1,
    ];
});
