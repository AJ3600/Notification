<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'post_id' => $faker->numberBetween($min = 1, $max = 500)
    ];
});
