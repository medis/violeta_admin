<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Show::class, function($faker) {
    return [
        'venue'   => $faker->text(10),
        'address' => $faker->address(),
        'date'    => $faker->DateTime()
    ];
});

$factory->define(App\Blog::class, function($faker) {
    return [
        'title'   => $faker->text(10),
        'source'  => $faker->text(10),
        'date'    => $faker->DateTime(),
        'link'    => $faker->url()
    ];
});

$factory->define(App\Music::class, function($faker) {
    return [
        'title'    => $faker->text(10),
        'type'   => $faker->text(10),
        'source'  => $faker->text(10)
    ];
});