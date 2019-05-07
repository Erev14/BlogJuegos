<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Publication::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = random_int(1, 10)),
        'content' => $faker->text($maxNbChars = random_int(20, 300)),
        'urlCover' => $faker->imageUrl($width = 640, $height = 480, 'abstract'),
        'user_id' => 0
    ];
});
