<?php

use Faker\Generator as Faker;

$factory->define(App\Text::class, function (Faker $faker) {
    return [
        'machine_name' => $faker->word(),
        'title'        => $faker->words(3),
        'body'         => $faker->paragraph()
    ];
});
