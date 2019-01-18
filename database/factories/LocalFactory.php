<?php

use Faker\Generator as Faker;

$factory->define(App\Local::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->word,
        'codigo'=>str_random(3).rand(0,9),
        'tipo'=>$faker->word,
    ];
});
