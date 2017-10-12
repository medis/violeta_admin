<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        'title'   => $faker->text(10),
        'source'  => $faker->text(10),
        'date'    => $faker->DateTime(),
        'link'    => $faker->url()
    ];
});
