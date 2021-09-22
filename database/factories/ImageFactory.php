<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$courses = \App\Course::get();

$factory->define(\App\Image::class, function (Faker $faker) use ($courses) {
    return [
        'path' => "images/bomUWFCdZ2DN3X1p1HwkHtG7BtqAU3dLnBWDc77y.jpg",
        'imageable_type' => "App\Course",
        'imageable_id' =>  "1",
    ];
});
