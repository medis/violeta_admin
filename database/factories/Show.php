<?php

use Faker\Generator as Faker;

$factory->define(App\Show::class, function (Faker $faker) {
    return [
        'venue'   => $faker->text(10),
        'address' => $faker->address(),
        'date'    => $faker->DateTime()
    ];
});
