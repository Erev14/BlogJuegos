<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'picture_url' => $faker->imageUrl($width = 200, $height = 200, 'people'), 
        'first_name' => $faker->firstName, 
        'last_name' => $faker->lastName, 
        'age' => random_int(18, 40),
    ];
});
