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


$factory->define(App\Ciudad::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->unique()->city,
    ];
});

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->firstname,
        'email' => $faker->unique()->safeEmail,
        'telefono' => $faker->phonenumber,
    ];
});

$factory->define(App\Articulo::class, function (Faker\Generator $faker) {

    return [
        'descripcion' => $faker->randomElement(['Nevera','Lavadora','Televisor','Play4']),
        'valorUnitario' => $faker->numberBetween($min = 1000, $max = 9000),
        'imagen' => $faker->randomElement(['1.png','2.png','3.png','4.png']),
    ];
});

$factory->define(App\Direccionenvio::class, function (Faker\Generator $faker) {

    return [
        'descripcion' => $faker->address(),
        'ciudad_id' => App\Ciudad::inRandomOrder()->first()->id,
        'cliente_id' => App\Cliente::inRandomOrder()->first()->id,
    ];
});

$factory->define(App\Locacion::class, function (Faker\Generator $faker) {

    return [
        'longitud' => $faker->latitude($min = -90, $max = 90),
        'latitud' => $faker->longitude($min = -180, $max = 180),
        'direccionenvio_id' => App\Direccionenvio::inRandomOrder()->first()->id,
    ];
});

$factory->define(App\Pedido::class, function (Faker\Generator $faker) {

    return [
        'fechaPedido' => $faker->dateTime($max = 'now', $timezone = null),
        'direccionenvio_id' => App\Direccionenvio::inRandomOrder()->first()->id,
    ];
});
