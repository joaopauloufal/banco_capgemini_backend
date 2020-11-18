<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Cliente;
use App\User;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'cpf' => (string) $faker->numerify('###.###.###-##'),
        'user_id' => factory(User::class)
    ];
});
