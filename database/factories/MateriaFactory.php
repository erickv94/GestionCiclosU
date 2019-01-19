<?php

use Faker\Generator as Faker;

$factory->define(App\Materia::class, function (Faker $faker) {
    return [
        'nombre'=>'Materia '.Rand(1,1000),
        'codigo'=>str_random(4).rand(1,100),
        'descripcion'=>$faker->sentence(),
    ];
});
