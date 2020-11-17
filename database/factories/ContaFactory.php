<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Agencia;
use App\Entities\Cliente;
use App\Entities\Conta;
use Faker\Generator as Faker;

$factory->define(Conta::class, function (Faker $faker) {
    return [
        'cliente_id' => factory(Cliente::class),
        'agencia_id' => factory(Agencia::class),
        'numero' => (string) $faker->numerify('#######-#'),
        'tipo' => 'corrente',
        'saldo' => 0.0
    ];
});
