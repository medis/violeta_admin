<?php

use Faker\Generator as Faker;

$factory->define(App\Music::class, function (Faker $faker) {
    return [
        'title'    => $faker->text(10),
        'type'   => $faker->text(10),
        'source'  => $faker->text(10)
    ];
});
