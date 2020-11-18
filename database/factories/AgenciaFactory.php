<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Agencia;
use Faker\Generator as Faker;

$factory->define(Agencia::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'numero' => (string) $faker->randomNumber(4)
    ];
});
