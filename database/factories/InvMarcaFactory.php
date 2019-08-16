<?php

use Faker\Generator as Faker;

$factory->define(App\InvMarca::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'simbolo' => '$',
        'company_id' => 1
    ];
});
