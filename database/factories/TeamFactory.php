<?php
use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(10),
        //'content' => $faker->paragraphs(5, true)
        'createt_at' => $faker->dateTimeBetween('-3 months'),

    ];
});

$factory->state(App\Team::class, 'barcelona', function (Faker $faker) {
    return [
        'name' => 'Barcelona',
    ];
});
