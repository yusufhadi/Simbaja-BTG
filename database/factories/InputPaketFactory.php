<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InputPaket;
use App\Model;
use Faker\Generator as Faker;

$factory->define(InputPaket::class, function (Faker $faker) {
    return [
        'SKPD' => $faker->sentence(3),
        'tahun' => $faker->year(),
        'tender/nonTender' =>  $faker->word(),
        'namaPaket' => $faker->name(),
        'namaPenyedia' => $faker->name(),
        'paguAnggaran' => $faker->numberBetween(50000, 50000000),
        'nilaiKontrak' => $faker->numberBetween(50000, 50000000),
        'nilaiHps' => $faker->numberBetween(50000, 50000000),
        'efisiensi' => $faker->numberBetween(50000, 50000000),
    ];
});
