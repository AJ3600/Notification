<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->state,
        'content' => $faker->paragraph($nbSentences = 20, $variableNbSentences = true),
        'user_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});
