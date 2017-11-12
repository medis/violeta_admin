<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'link'  => $faker->url()
    ];
});
