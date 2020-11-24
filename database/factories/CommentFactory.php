<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
        'createt_at' => $faker->dateTimeBetween('-3 months'),

    ];
});
